using DJI.WindowsSDK;
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

// The Blank Page item template is documented at https://go.microsoft.com/fwlink/?LinkId=234238

namespace Mavic2Pro.ViewModels
{
    /// <summary>
    /// An empty page that can be used on its own or navigated to within a Frame.
    /// </summary>
    public sealed partial class Management : Page
    {
        private SDKError ErrorCode { get; set; }


        public Management()
        {
            this.InitializeComponent();
        }

        private void GetPage_Click(object sender, RoutedEventArgs e)
        {
            Button btn = sender as Button;

            Frame frame = new Frame();

            switch (btn.Name)
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

        private async void GetHomeLocation_Click(object sender, RoutedEventArgs e)
        {
            var homeLoc = await DJISDKManager.Instance.ComponentManager.GetFlightControllerHandler(0, 0).GetHomeLocationAsync();

            if (homeLoc.error == SDKError.NO_ERROR)
            {
                getHomeTB.Text = "Latitude: " + homeLoc.value.Value.latitude + "\nLongitude: " + homeLoc.value.Value.longitude;
            }
            else
            {
                getHomeTB.Text = homeLoc.error.ToString();
            }            
        }

        private async void SetHomeLocation_Click(object sender, RoutedEventArgs e)
        {
            if (latTbox.Text != "" && longTbox.Text != "")
            {
                LocationCoordinate2D setHomeLocation = new LocationCoordinate2D
                {
                    latitude = Convert.ToDouble(latTbox.Text),
                    longitude = Convert.ToDouble(longTbox.Text)
                };

                ErrorCode = await DJISDKManager.Instance.ComponentManager.GetFlightControllerHandler(0, 0).SetHomeLocationAsync(setHomeLocation);

                if (ErrorCode == SDKError.NO_ERROR)
                {
                    errorMsgTB.Text = "Home location changed.";
                }
                else
                {
                    errorMsgTB.Text = ErrorMsg();
                }
            }            
        }

        private async void SetHomeLocationUsingAircraftCurrentLocation_Click(object sender, RoutedEventArgs e)
        {
            ErrorCode = await DJISDKManager.Instance.ComponentManager.GetFlightControllerHandler(0, 0).SetHomeLocationUsingAircraftCurrentLocationAsync();

            if (ErrorCode == SDKError.NO_ERROR)
            {
                errorMsgTB.Text = "Home location from aircraft's current location changed.";
            }
            else
            {
                errorMsgTB.Text = ErrorMsg();
            }
        }

        private string ErrorMsg()
        {
            return "Something went wrong:\n" + ErrorCode.ToString();
        }

        private async void StartGoHome_Click(object sender, RoutedEventArgs e)
        {
            ErrorCode = await DJISDKManager.Instance.ComponentManager.GetFlightControllerHandler(0, 0).StartGoHomeAsync();

            if (ErrorCode == SDKError.NO_ERROR)
            {
                goHomeErrTB.Text = "Starting going home.";
            }
            else
            {
                goHomeErrTB.Text = ErrorMsg();
            }
        }

        private async void StopGoHome_Click(object sender, RoutedEventArgs e)
        {
            ErrorCode = await DJISDKManager.Instance.ComponentManager.GetFlightControllerHandler(0, 0).StopGoHomeAsync();

            if (ErrorCode == SDKError.NO_ERROR)
            {
                stopGoHomeErrTB.Text = "Stopping going home.";
            }
            else
            {
                stopGoHomeErrTB.Text = ErrorMsg();
            }
        }

        private async void StartTakeoff_Click(object sender, RoutedEventArgs e)
        {
            ErrorCode = await DJISDKManager.Instance.ComponentManager.GetFlightControllerHandler(0, 0).StartTakeoffAsync();

            if (ErrorCode == SDKError.NO_ERROR)
            {
                startTakeoffTB.Text = "Starting takeoff.";
            }
            else
            {
                startTakeoffTB.Text = ErrorMsg();
            }
        }

        private async void StopTakeoff_Click(object sender, RoutedEventArgs e)
        {
            ErrorCode = await DJISDKManager.Instance.ComponentManager.GetFlightControllerHandler(0, 0).StopTakeoffAsync();

            if (ErrorCode == SDKError.NO_ERROR)
            {
                stopTakeoffTB.Text = "Stopping takeoff.";
            }
            else
            {
                stopTakeoffTB.Text = ErrorMsg();
            }
        }

        private async void StartAutoLanding_Click(object sender, RoutedEventArgs e)
        {
            ErrorCode = await DJISDKManager.Instance.ComponentManager.GetFlightControllerHandler(0, 0).StartAutoLandingAsync();

            if (ErrorCode == SDKError.NO_ERROR)
            {
                autoLandingTB.Text = "Starting auto-landing.";
            }
            else
            {
                autoLandingTB.Text = ErrorMsg();
            }
        }

        private async void StopAutoLanding_Click(object sender, RoutedEventArgs e)
        {
            ErrorCode = await DJISDKManager.Instance.ComponentManager.GetFlightControllerHandler(0, 0).StopAutoLandingAsync();

            if (ErrorCode == SDKError.NO_ERROR)
            {
                autoLandingTB.Text = "Stopping auto-landing.";
            }
            else
            {
                autoLandingTB.Text = ErrorMsg();
            }
        }

        private async void GetWindWarning_Click(object sender, RoutedEventArgs e)
        {
            var fCWindWarningMsg = await DJISDKManager.Instance.ComponentManager.GetFlightControllerHandler(0, 0).GetWindWarningAsync();

            if (fCWindWarningMsg.error == SDKError.NO_ERROR)
            {
                windWarningTB.Text = fCWindWarningMsg.value.Value.value.ToString();
            }
            else
            {
                windWarningTB.Text = fCWindWarningMsg.error.ToString();
            }            
        }

        private async void GetActionByBatteryLife_Click(object sender, RoutedEventArgs e)
        {
            var recAction = await DJISDKManager.Instance.ComponentManager.GetFlightControllerHandler(0, 0).GetBatteryThresholdBehaviorAsync();

            if (recAction.error == SDKError.NO_ERROR)
            {
                actionTB.Text = recAction.value.Value.value.ToString();
            }
            else
            {
                actionTB.Text = recAction.error.ToString();
            }            
        }

        private async void GetRemainingFlightTime_Click(object sender, RoutedEventArgs e)
        {
            var timeLeft = await DJISDKManager.Instance.ComponentManager.GetFlightControllerHandler(0, 0).GetRemainingFlightTimeAsync();

            if (timeLeft.error == SDKError.NO_ERROR)
            {
                timeLeftTB.Text = timeLeft.value.Value.value.ToString() + " seconds.";
            }
            else
            {
                timeLeftTB.Text = timeLeft.error.ToString();
            }
        }

        private async void GetLowBatteryWarning_Click(object sender, RoutedEventArgs e)
        {
            var lowBatteryWarning = await DJISDKManager.Instance.ComponentManager.GetFlightControllerHandler(0, 0).GetLowBatteryWarningThresholdAsync();

            if (lowBatteryWarning.error == SDKError.NO_ERROR)
            {
                lowBatteryWarningTB.Text = lowBatteryWarning.value.Value.value.ToString() + " percent.";
            }
            else
            {
                lowBatteryWarningTB.Text = lowBatteryWarning.error.ToString();
            }
        }
    }
}
