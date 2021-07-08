# Mavic 2 Pro/Enterprise Documentation

The project is a typical Visual Studio solution with its files.

## Installation

### Requirements

First clone/download the repository from https://github.com/kryman80/mavic2pro.git.

#### Visual Studio

Here the user can choose which appropriate option (number) to approach.

1) There is no guarantee that the application will work with the latest Visual Studio. If it will not work with the latest Windows 10 SDK (or a minimum version of 10.0.16299.0), try one of the options below.

2) Most simple would be to install VS 2017. If using this version, all that needs to be done is to make sure the right platform is targeted. When pushing the project to Github, of course, only the project files in its folder get's pushed.

3) Make sure you are either using VS 2017, or if later version, install the VS 2017 Build tools from https://www.visualstudio.com/thank-you-downloading-visual-studio/?sku=BuildTools. When installing, click the workload "Visual C++ build tools", and on the menu to the right ("Installation details") under "Optional" also choose appropriate Windows 10 SDK.

#### Windows SDK

At least make sure you have a minimum version of Windows 10 SDK, 10.0.16299.0. If this would not work, try the latest Windows 10 SDK.

(This instruction which follows, if the application would not work, try follow it, else, skip the rest of this header.)

After installation from one of those options, we need to target the right platform for the project. This step should make all non-platform conformity issues disappear. If by chance, the settings are not configured when cloning the repo, these steps needs to be done. Right click the Mavic2Pro project and choose "Properties" -> "Build" and in "Configuration" choose "Active (Debug)" or "Debug" and the "Platform" either "Active (x86)" or "x86". This should change the "Platform target" to "x86", as can be seen further down on the same page.

Appropriate Windows SDK would be as a minimum version, 10.0.16299.0. Make sure to install it if you have an earlier or later version.

## Application

Make sure to connect Mavic 2 Pro/Enterprise to the computer. Steps for this can be found on https://developer.dji.com/windows-sdk/documentation/connection/Mavic2.html.

When opening the solution file, first time the application will parse some files, after that make sure to change the "Debug" to "x86" under the "Team" menu. This Debug tab is to the left of the run green play button next to "Local Machine" or "Device".

Start the application by running it. When first time running the app, the solution will build it and package it into an executable that will be installed locally on the computer. This executable application can be found mostly under "Recent" in the start menu or where applications are installed.

The application is mostly oriented about creating a waypoint mission. A waypoint mission consists of waypoints. A waypoint is a geographical location which consists of a latitude and a longitude coordinate. 

You can either manually fly the drone with the remote controller and fetch some coordinates and save them into a list, and create a waypoint mission (input values in the fields) to let the drone fly in auto pilot mode, or you can enter all the input fields with coordinates and let the drone do all the bidding. You can also combine, fetch some coordinates and add some manually in the input field for the coordinate field. But mandatory for creating a waypoint mission (which will start the mission when clicking the button) is to enter those fields and make sure some coordinates follows along. 
A successful test has been done with the aircraft’s motors on–connected to the remote controller which in turn is connected to the computer–standing in place, and creating a waypoint mission manually with some coordinates.

The application has a top menu bar for all the pages to choose from. The first icon is the "Home" page, starting page, the next is the "Settings" page. By clicking on a menu (icon) the page will reload.

### Home Page

First page is the "Home" page. This page is oriented to a convenient way working with the waypoint mission. When the correct input has been given to all the fields, one is able to create a waypoint mission by clicking the button “Create Waypoint Mission”. The first input is meant for how many waypoints one wish to have. At the moment, five is the maximum of waypoints, however, there is no guarantee if one should add coordinates manually without saving any in the list, that more waypoints would work. Second and third field takes an input of a number, as the placeholder text says, between the lowest value to the highest. Fourth takes a number of any mission id. Fifth field takes (manually) a list of coordinates. If only one lat. and long. coordinate will be presented, or several, make sure that the last coordinates don't end with a comma ",". Follow the example in the placeholder text as written: "15.5678 10.1234" means latitude and longitude separated with a mandatory space. If more coordinates follow upon that, separate with a comma ",". The quotation marks must not be included. If one chooses to, one can either add waypoints manually (the input field) and automatically (by clicking the “Save Coordinates” button). But you need to fetch the coordinates if you want to save them automatically, by clicking the button “Get Coordinates”.

During the flight, one can record the drone’s surroundings by first enabling the record video mode for the drone’s camera via the “Set Camera Record Video Mode”. After that, one can at will either start or stop the recording of the camera by clicking either of the buttons below.

The grayed out fields are disabled for input, it means that these are the parameters hard coded for the waypoint mission. Of course, all these can be modified in the source code.

### Settings Page

This page allows certain different settings to be changed for the sake of convenience. 

The reason enabling some of these features on this page was to make sure that the RTH button would work, and not to come into a situation, like an idiot I know, who unfortunately drove the thing into the branches of some tree and saw how it dropped dead on the grass. While he was in some panic, strange to say, he was joyous on the inside and it would be as seeing a man raising his hands into the air laughing and shouting at the same time, "Ad Mejoram Dei Gloriam!"

#### Location

Clicking the button “Get Home Location” means that the application will present the location for the drone when it returns home. The remote controller (rc) has a button, “RTH” (Return to Home), this can be found above the left joystick. This means that the drone will return to the last recorded home point. (Some parameters ought to be considered. This can be found on p. 15 in the physical manual of the drone.) There are two fields for setting the home location, latitude and longitude. The last button has an explanatory text.

#### Home

Clicking “Go Home” button makes the aircraft return home. “Stop Go Home” button means the aircraft will stop going home and will hover in place.

#### Takeoff

When clicking “Start Takeoff”, the aircraft will takeoff only when the motors are off, and when the drone is hovering 1.2 m above the ground, the takeoff has completed. The “Stop Takeoff” button cancels the aircraft’s takeoff. If this button is clicked before the “Start Takeoff” button, or rather, called before the function that triggers the takeoff, until the takeoff has completed, the aircraft will cancel the takeoff and hover at the current height. The next button, “Start Auto Landing” starts the auto landing of the aircraft. “Stop Auto Landing” stops the auto landing. As with the takeoff, if this button is called before the function is complete that starts the auto landing, then the auto landing will be canceled and the aircraft will hover at its current location. The wind warning button gets a warning related to high winds.

#### Aircraft

Button “Get Rec. Action Based On Battery Life” gets the recommended action based on remaining battery life. Values are FLY_NORMALLY (remaining battery life sufficient for normal flying); GO_HOME (remaining battery life sufficient to go home); LAND_IMMEDIATELY (remaining battery life sufficient to land immediately) and UNKNOWN (this would be an unknown state). “Get Remaining Flight Time” button gets the estimated remaining time, in seconds; how long it will take the aircraft to go home with a 10% battery buffer remaining. This time includes landing the aircraft. “Get Low Battery Warning” button gets the flight controller's low battery threshold as a percent.

## Debugging

If the application starts out well, but something occurs during the run time, probably a bug might appear in the code. Try do something on the first page, "Home", without clicking on any other page. The home page has been tested and confirmed working with an outside test of the drone, although one test only, by adding input on all the fields and matching those required parameters (which can be seen from the placeholder texts) for the waypoint mission (with at least these coordinates 56.184413 15.591409, 56.188497 15.597711, 56.182480 15.600884), and not saving any coordinates via the save coordinate button.

If the application in VS has red squiggles all over the application, either the user has moved the folder or there might be some platform inconveniences. Try rebuild the solution, restart VS and see what happens. If the application still does not work, right-click the DJIVideoParser project, try "Unload Project" and restart.

One thing to keep in mind. The application runs on a certain generated key from my account on DJI's developer page. This key is connected to my account. For changing this key, one has to create an account on their developer center site, and create an app on this site which will generate an app key for the user to insert into the source code in the `DJISDKManager.Instance.RegisterApp("app key here");` method in `MainPage()` method in the MainPage.xaml.cs file. There is no guarantee how long this key will be up and running. If changing the key, also needed to change will be the package name. This is done by double-clicking, or open the file in solution explorer, "Package.appxmanifest", go to the tab "Packaging" and to the right of "Package name:" change it by copying the "Package Name" value from your developer center account, where you created the app. (Creating an app is just entering some information in some fields.)