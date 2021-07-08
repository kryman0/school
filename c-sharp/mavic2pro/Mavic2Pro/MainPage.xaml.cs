using DJI.WindowsSDK;
using DJIVideoParser;
using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Runtime.InteropServices.WindowsRuntime;
using Windows.Foundation;
using Windows.Foundation.Collections;
using Windows.UI.Xaml;
using Windows.UI.Xaml.Controls;
using Windows.UI.Xaml.Controls.Primitives;
using Windows.UI.Xaml.Data;
using Windows.UI.Xaml.Input;
using Windows.UI.Xaml.Media;
using Windows.UI.Xaml.Navigation;

// The Blank Page item template is documented at https://go.microsoft.com/fwlink/?LinkId=402352&clcid=0x409

namespace Mavic2Pro
{
    /// <summary>
    /// An empty page that can be used on its own or navigated to within a Frame.
    /// </summary>
    public sealed partial class MainPage : Page
    {
        //use videoParser to decode raw data.
        private DJIVideoParser.Parser videoParser;


        private List<Waypoint> listWaypoints = new List<Waypoint>();
        private int counter = 0;

        private double Latitude { get; set; }
        private double Longitude { get; set; }
        private SDKError ErrorMessageCode { get; set; }
        
        public MainPage()
        {
            this.InitializeComponent();
            DJISDKManager.Instance.SDKRegistrationStateChanged += Instance_SDKRegistrationEvent;

            // Replace with registered app key.
            DJISDKManager.Instance.RegisterApp("b1091cdfffe11a51cafa0668");
        }

        private async void Instance_SDKRegistrationEvent(SDKRegistrationState state, SDKError resultCode)
        {
            if (resultCode == SDKError.NO_ERROR)
            {
                System.Diagnostics.Debug.WriteLine("Register app successfully.");

                //The product connection state will be updated when it changes here.
                DJISDKManager.Instance.ComponentManager.GetProductHandler(0).ProductTypeChanged += async delegate (object sender, ProductTypeMsg? value)
                {
                    await Dispatcher.RunAsync(Windows.UI.Core.CoreDispatcherPriority.Normal, async () =>
                    {
                        if (value != null && value?.value != ProductType.UNRECOGNIZED)
                        {
                            System.Diagnostics.Debug.WriteLine("The Aircraft is connected now.");
                            //You can load/display your pages according to the aircraft connection state here.
                        }
                        else
                        {
                            System.Diagnostics.Debug.WriteLine("The Aircraft is disconnected now.");
                            //You can hide your pages according to the aircraft connection state here, or show the connection tips to the users.
                        }
                    });
                };

                //If you want to get the latest product connection state manually, you can use the following code
                var productType = (await DJISDKManager.Instance.ComponentManager.GetProductHandler(0).GetProductTypeAsync()).value;
                if (productType != null && productType?.value != ProductType.UNRECOGNIZED)
                {
                    System.Diagnostics.Debug.WriteLine("The Aircraft is connected now.");
                    //You can load/display your pages according to the aircraft connection state here.
                }
            }
            else
            {
                System.Diagnostics.Debug.WriteLine("Register SDK failed, the error is: ");
                System.Diagnostics.Debug.WriteLine(resultCode.ToString());
            }
        }

        private async void SetCameraWorkMode(CameraWorkMode camWrkMode)
        {
            if (DJISDKManager.Instance.ComponentManager != null)
            {
                CameraWorkModeMsg camWrkModeMsg = new CameraWorkModeMsg();
                camWrkModeMsg.value = camWrkMode;

                var errorMsg = await DJISDKManager.Instance.ComponentManager.GetCameraHandler(0, 0).SetCameraWorkModeAsync(camWrkModeMsg);
                if (errorMsg == SDKError.NO_ERROR)
                {
                    cameraModeTB.Text = camWrkMode.ToString();
                }
                else
                {
                    cameraModeTB.Text = "Something went wrong. \n" + errorMsg.ToString();                    
                }
            }
        }
                
        private void SetCameraWorkModeToRecordVideo_Click(object sender, RoutedEventArgs e)
        {
            SetCameraWorkMode(CameraWorkMode.RECORD_VIDEO);
        }

        private async void StartRecordVideo_Click(object sender, RoutedEventArgs e)
        {
            if (DJISDKManager.Instance.ComponentManager != null)
            {
                var getCamWrkMode = await DJISDKManager.Instance.ComponentManager.GetCameraHandler(0, 0).GetCameraWorkModeAsync();
                if (getCamWrkMode.value?.value == CameraWorkMode.RECORD_VIDEO)
                {
                    var errorCode = await DJISDKManager.Instance.ComponentManager.GetCameraHandler(0, 0).StartRecordAsync();
                    if (errorCode == SDKError.NO_ERROR)
                    {
                        await DJISDKManager.Instance.ComponentManager.GetCameraHandler(0, 0).StartRecordAsync();
                        cameraModeTB.Text = "Started recording.";
                    }
                }
            }            
        }
        
        private async void StopRecordVideo_Click(object sender, RoutedEventArgs e)
        {
            if (DJISDKManager.Instance.ComponentManager != null)
            {
                var errorCode = (await DJISDKManager.Instance.ComponentManager.GetCameraHandler(0, 0).StopRecordAsync());
                if (errorCode == SDKError.NO_ERROR)
                {
                    await DJISDKManager.Instance.ComponentManager.GetCameraHandler(0, 0).StopRecordAsync();
                    cameraModeTB.Text = "Stopped recording.";
                }
            }            
        }

        private async void CreateWaypoint_Click(object objSender, RoutedEventArgs e)
        {
            WaypointMission waypointMission = CreateWaypointMission();

            if (DJISDKManager.Instance.ComponentManager != null)
            {
                await Dispatcher.RunAsync(Windows.UI.Core.CoreDispatcherPriority.Normal, async () =>
                {
                    // Need to set SetGroundStationModeEnabledAsync(bool) for the waypoint mission to work.
                    // https://developer.dji.com/api-reference/windows-api/Components/FlightControllerHandler.html#flightcontrollerhandler_setgroundstationmodeenabledasync_inline
                    BoolMsg groundStnModeTrue = new BoolMsg
                    {
                        value = true
                    };
                    
                    ErrorMessageCode = await DJISDKManager.Instance.ComponentManager.GetFlightControllerHandler(0, 0).SetGroundStationModeEnabledAsync(groundStnModeTrue);

                    if (ErrorMessageCode == SDKError.NO_ERROR)
                    {
                        var waypointMissionState = DJISDKManager.Instance.WaypointMissionManager.GetWaypointMissionHandler(0).GetCurrentState();

                        if (waypointMissionState == WaypointMissionState.READY_TO_UPLOAD || waypointMissionState == WaypointMissionState.READY_TO_EXECUTE)
                        {
                            // Hard coded Waypoint mission.
                            //errorMessageCode = DJISDKManager.Instance.WaypointMissionManager.GetWaypointMissionHandler(0).LoadMission(HardCodeWaypointMission());

                            // Comment this out if trying with hard coded mission.
                            ErrorMessageCode = DJISDKManager.Instance.WaypointMissionManager.GetWaypointMissionHandler(0).LoadMission(waypointMission);

                            if (ErrorMessageCode != SDKError.PARAMETERS_SET_ERROR && ErrorMessageCode != SDKError.INVALID_REQUEST_IN_CURRENT_STATE)
                            {
                                var getWaypointMission = DJISDKManager.Instance.WaypointMissionManager.GetWaypointMissionHandler(0).GetLoadedMission();

                                if (getWaypointMission != null)
                                {
                                    var waypointMissionStateAfterLoadingMission = DJISDKManager.Instance.WaypointMissionManager.GetWaypointMissionHandler(0).GetCurrentState();

                                    if (waypointMissionStateAfterLoadingMission == WaypointMissionState.READY_TO_UPLOAD)
                                    {
                                        ErrorMessageCode = await DJISDKManager.Instance.WaypointMissionManager.GetWaypointMissionHandler(0).UploadMission();

                                        // If a timeout error occurs during the previous upload, the upload operation will resume from the previous break-point.
                                        if (ErrorMessageCode == SDKError.NO_ERROR)
                                        {
                                            var getCurrState = DJISDKManager.Instance.WaypointMissionManager.GetWaypointMissionHandler(0).GetCurrentState();

                                            DJISDKManager.Instance.WaypointMissionManager.GetWaypointMissionHandler(0).UploadStateChanged += WaypointMission_GetUploadedState;
                                        }
                                    }
                                }
                            }
                        }
                    }
                });                           
            }            
        }

        private async void WaypointMission_GetUploadedState(DJI.WindowsSDK.Mission.Waypoint.WaypointMissionHandler sender, WaypointMissionUploadState? value)
        {
            WaypointMissionState getCurrState = new WaypointMissionState();

            await Dispatcher.RunAsync(Windows.UI.Core.CoreDispatcherPriority.Normal, () =>
            {
                if (value.Value.errorCode == 0)
                {
                    getCurrState = DJISDKManager.Instance.WaypointMissionManager.GetWaypointMissionHandler(0).GetCurrentState();
                    getCurrStateTB.Text = getCurrState.ToString();
                }
            });

            if (getCurrState == WaypointMissionState.READY_TO_EXECUTE)
            {
                await Dispatcher.RunAsync(Windows.UI.Core.CoreDispatcherPriority.Normal, async () =>
                {
                    ErrorMessageCode = await DJISDKManager.Instance.WaypointMissionManager.GetWaypointMissionHandler(0).StartMission();
                });
            }
        }

        private WaypointMission CreateWaypointMission()
        {
            if (waypointLatLong.Text != "")
            {
                string[] arrFromWaypointLatLong = waypointLatLong.Text.Split(",");
                foreach (string item in arrFromWaypointLatLong)
                {
                    string[] latLongArr = item.Trim().Split(" ");
                    Waypoint waypoint = new Waypoint
                    {
                        location = new LocationCoordinate2D { latitude = Convert.ToDouble(latLongArr[0]), longitude = Convert.ToDouble(latLongArr[1]) }
                    };
                    listWaypoints.Add(waypoint);
                }
            }
            
            // Only member not set is pointOfInterest.
            WaypointMission waypointMission = new WaypointMission
            {
                autoFlightSpeed = Convert.ToDouble(waypAutoFlightSpeed.Text),
                exitMissionOnRCSignalLostEnabled = false,
                finishedAction = WaypointMissionFinishedAction.NO_ACTION,
                flightPathMode = WaypointMissionFlightPathMode.NORMAL,
                gimbalPitchRotationEnabled = false,
                gotoFirstWaypointMode = WaypointMissionGotoFirstWaypointMode.POINT_TO_POINT,
                headingMode = WaypointMissionHeadingMode.AUTO,
                maxFlightSpeed = Convert.ToDouble(waypMaxFlightSpeed.Text),
                missionID = Convert.ToInt32(waypMissionID.Text),
                repeatTimes = 0,
                waypointCount = Convert.ToInt32(waypCount.Text),
                waypoints = listWaypoints
            };

            waypointsTB.Text = "waypoints: " + listWaypoints.Count.ToString();

            return waypointMission;
        }

        private async void GetCoordinates_Click(object sender, RoutedEventArgs e)
        {
            var coordinatesOfAircraft = await DJISDKManager.Instance.ComponentManager.GetFlightControllerHandler(0, 0).GetAircraftLocationAsync();
            if (coordinatesOfAircraft.error == SDKError.NO_ERROR)
            {
                Latitude = coordinatesOfAircraft.value.Value.latitude;
                Longitude = coordinatesOfAircraft.value.Value.longitude;
                coordinatesTB.Text = "Lat. " + Latitude.ToString() + "\nLong. " + Longitude.ToString();
            }
            else
            {
                // Without the drone.            
                Latitude = -34.87335522334455666677;
                Longitude = -34.87335522334455666677;
                coordinatesTB.Text = "Lat. " + Latitude.ToString() + "\nLong. " + Longitude.ToString();
            }
        }

        private void SaveCoordinates_Click(object sender, RoutedEventArgs e)
        {
            if (DJISDKManager.Instance.ComponentManager != null)
            {
                Waypoint waypoint = new Waypoint
                {
                    location = new LocationCoordinate2D { latitude = Latitude, longitude = Longitude }
                };
                listWaypoints.Add(waypoint);

                if (counter == 5)
                {
                    counter = 0;
                    savedCoords.Text = "";
                    listWaypoints.Clear();
                }
                else
                {
                    counter += 1;
                    savedCoords.Text += Convert.ToString(counter) + ". " + Latitude.ToString() + " " + Longitude.ToString() + "\n";
                }
            }

            waypointsTB.Text = "waypoints: " + listWaypoints.Count.ToString();
        }

        // Hard code waypoint mission.
        private WaypointMission HardCodeWaypointMission()
        {
            // Only member not set is pointOfInterest.
            WaypointMission waypointMission = new WaypointMission
            {
                autoFlightSpeed = 5,
                exitMissionOnRCSignalLostEnabled = false,
                finishedAction = WaypointMissionFinishedAction.NO_ACTION,
                flightPathMode = WaypointMissionFlightPathMode.NORMAL,
                gimbalPitchRotationEnabled = false,
                gotoFirstWaypointMode = WaypointMissionGotoFirstWaypointMode.POINT_TO_POINT,
                headingMode = WaypointMissionHeadingMode.AUTO,
                maxFlightSpeed = 5,
                missionID = 12,
                repeatTimes = 0,
                waypointCount = 3,
                waypoints = CreateWaypoints()
            };

            return waypointMission;
        }

        // Hard code waypoints.
        private List<Waypoint> CreateWaypoints()
        {
            Waypoint waypoint1 = new Waypoint
            {
                location = new LocationCoordinate2D { latitude = 56.184413, longitude = 15.591409 } // Telenor                
            };

            Waypoint waypoint2 = new Waypoint
            {
                location = new LocationCoordinate2D { latitude = 56.188497, longitude = 15.597711 } // Idrottsplatsen
            };

            Waypoint waypoint3 = new Waypoint
            {
                location = new LocationCoordinate2D { latitude = 56.182480, longitude = 15.600884 } // Bergåsa station
            };

            List<Waypoint> listOfWaypoints = new List<Waypoint>();
            listOfWaypoints.Add(waypoint1);
            listOfWaypoints.Add(waypoint2);
            listOfWaypoints.Add(waypoint3);

            return listOfWaypoints;
        }

        private void GetPage_Click(object sender, RoutedEventArgs e)
        {
            Button btn = sender as Button;

            Frame frame = new Frame();
            
            switch(btn.Name)
            {
                case "homeAppBarBtn":
                    frame.Navigate(typeof(MainPage));
                    break;
                case "settingAppBarBtn":
                    frame.Navigate(typeof(ViewModels.Management));
                    break;
            }

            Window.Current.Content = frame;
            Window.Current.Activate();
        }
    }
}
