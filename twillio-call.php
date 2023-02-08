<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>

  
  <link rel="stylesheet" href="<?php echo $url->assets ?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?php echo $url->assets ?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?php echo $url->assets ?>plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="<?php echo $url->assets ?>plugins/toastr/toastr.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo $url->assets ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo $url->assets ?>plugins/jqvmap/jqvmap.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo $url->assets ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo $url->assets ?>plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo $url->assets ?>plugins/summernote/summernote-bs4.css">
  
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo $url->assets ?>plugins/select2/css/select2.min.css" />

  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo $url->assets ?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo $url->assets ?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?php echo $url->assets ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo $url->assets ?>css/adminlte.min.css">


  <link rel="stylesheet" href="<?php echo $url->assets ?>/frontend/dist/css/alt/style.css">
  
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo $url->assets ?>css/app.css">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
  <!-- Google Font: Source Sans Pro -->
  <!-- <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> -->
<script src="<?php echo $url->assets ?>plugins/jquery/jquery.min.js"></script>


      <div class=" ">
            <div class="row  p-4">
                <div class="col-6 mx-auto">
                        <h2 class="text-center"> <?= $lead->first_name ?>   <?= $lead->last_name ?></h2>
                </div>
            </div>
            <div class="row p-2 pb-5 ">
                <div class="col-6 mx-auto">
                    <div class="d-flex justify-content-center text-center">

                  


                       
                        <form>
                        <button id="button-hangup-outgoing" class="btn btn-danger rounded-circle mr-2 d-none" class="close" data-dismiss="modal" aria-label="Close"   ><i class="fas fa-phone"></i> </button>
                     

                            <label for="phone-number" class="d-none"
                            >Enter a phone number or client name</label
                            >
                            <input class="d-none" id="phone-number" type="text" placeholder="+15552221234" value="<?= $lead->phone	 ?>" />
                   
                            <button  id="button-call" type="submit" class="btn btn-success rounded-circle "><i class="fas fa-phone"></i></button>

                            <p id="calling_text" class="text-center mt-2 d-none">Calling...</p>
                           
                            <p id="timer" class="text-center mt-2 d-none "></p>
                            <input type="hidden" value="00:00" id="total_call_time">
                            <!-- <button type="button" id="start-timer" onclick="start()">Start </button>
                            <button type="button" id="stop-timer" onclick="stop()">Stop  </button> -->
                        </form>
                    </div>
                </div>
            </div>
      </div>

    <input type="hidden" name="count" id="timecount">

      <button id="startup-button" class="d-none">Start up the Device</button>
<main id="controls" class="d-none">
      <section class="left-column" id="info">
        <h2 class="d-none">Your Device Info</h2>
        <div id="client-name" class="d-none"></div>
        <div id="output-selection" class="hide">
          <label>Ringtone Devices</label>
          <select id="ringtone-devices"  multiple></select>
          <label>Speaker Devices</label>
          <select id="speaker-devices"  multiple></select>
          <br />
          <button id="get-devices" class="d-none">Seeing "Unknown" devices?</button>
        </div>
      </section>
      <section class="center-column">
        <h2 class="" class="d-none"></h2>
        <div id="call-controls" class="hide">
        
          
          <div id="incoming-call" class="hide">
            <h2 class="d-none">Incoming Call Controls</h2>
            <p class="instructions d-none" >
              Incoming Call from <span id="incoming-number"></span>
            </p>
            <button id="button-accept-incoming" class="d-none">Accept</button>
            <button id="button-reject-incoming" class="d-none">Reject</button>
            <button id="button-hangup-incoming"class="d-none">Hangup</button>
          </div>
          <div id="volume-indicators"  class="d-none">
            <label>Mic Volume</label>
            <div id="input-volume"></div>
            <br /><br />
            <label>Speaker Volume</label>
            <div id="output-volume"></div>
          </div>
        </div>
      </section>
      <section class="right-column d-none"  >
        <h2>Event Log</h2>
        <div class="hide" id="log"></div>
      </section>
    </main>
   


<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo $url->assets ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?php echo $url->assets ?>plugins/summernote/summernote-bs4.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>twillio_assets/voice/twilio.min.js"></script>
    
    <script>

$(function () {
  const speakerDevices = document.getElementById("speaker-devices");
  const ringtoneDevices = document.getElementById("ringtone-devices");
  const outputVolumeBar = document.getElementById("output-volume");
  const inputVolumeBar = document.getElementById("input-volume");
  const volumeIndicators = document.getElementById("volume-indicators");
  const callButton = document.getElementById("button-call");
  const outgoingCallHangupButton = document.getElementById("button-hangup-outgoing");
  const callControlsDiv = document.getElementById("call-controls");
  const audioSelectionDiv = document.getElementById("output-selection");
  const getAudioDevicesButton = document.getElementById("get-devices");
  const logDiv = document.getElementById("log");
  const incomingCallDiv = document.getElementById("incoming-call");
  const calling_text = document.getElementById("calling_text");
  const start_timer = document.getElementById("start-timer");
  const stop_timer = document.getElementById("stop-timer");
 const total_call_time = document.getElementById("total_call_time");

  const incomingCallHangupButton = document.getElementById(
    "button-hangup-incoming"
  );
  const incomingCallAcceptButton = document.getElementById(
    "button-accept-incoming"
  );
  const incomingCallRejectButton = document.getElementById(
    "button-reject-incoming"
  );
  const phoneNumberInput = document.getElementById("phone-number");
  const incomingPhoneNumberEl = document.getElementById("incoming-number");
  const startupButton = document.getElementById("startup-button");

  let device;
  let token;

  // Event Listeners

  callButton.onclick = (e) => {
    e.preventDefault();
    makeOutgoingCall();
  };
  getAudioDevicesButton.onclick = getAudioDevices;
  speakerDevices.addEventListener("change", updateOutputDevice);
  ringtoneDevices.addEventListener("change", updateRingtoneDevice);
  

  // SETUP STEP 1:
  // Browser client should be started after a user gesture
  // to avoid errors in the browser console re: AudioContext
  startupButton.addEventListener("click", startupClient);

  // SETUP STEP 2: Request an Access Token
  async function startupClient() {
    log("Requesting Access Token...");

    try {
      const data = await $.getJSON("<?php echo base_url() ?>/twillio_assets/voice/token.php");
      log("Got a token.");
      token = data.token;
      setClientNameUI(data.identity);
      intitializeDevice();
    } catch (err) {
      console.log(err);
      log("An error occurred. See your browser console for more information.");
    }
  }

  // SETUP STEP 3:
  // Instantiate a new Twilio.Device
  function intitializeDevice() {
    logDiv.classList.remove("hide");
    log("Initializing device");
    device = new Twilio.Device(token, {
      logLevel: 1,
      // Set Opus as our preferred codec. Opus generally performs better, requiring less bandwidth and
      // providing better audio quality in restrained network conditions.
      codecPreferences: ["opus", "pcmu"]
    });

    addDeviceListeners(device);

    // Device must be registered in order to receive incoming calls
    device.register();
  }

  // SETUP STEP 4:
  // Listen for Twilio.Device states
  function addDeviceListeners(device) {
    device.on("registered", function () {
      log("Twilio.Device Ready to make and receive calls!");
      callControlsDiv.classList.remove("hide");
    });

    device.on("error", function (error) {
      log("Twilio.Device Error: " + error.message);
    });

    device.on("incoming", handleIncomingCall);

    device.audio.on("deviceChange", updateAllAudioDevices.bind(device));

    // Show audio selection UI if it is supported by the browser.
    if (device.audio.isOutputSelectionSupported) {
      audioSelectionDiv.classList.remove("hide");
    }
  }

  // MAKE AN OUTGOING CALL

  async function makeOutgoingCall() {
    var params = {
      // get the phone number to call from the DOM
      To: phoneNumberInput.value,
    };

    if (device) {
      log(`Attempting to call ${params.To} ...`);
      callButton.classList.add("call_shake");
      calling_text.classList.remove("d-none");
      // Twilio.Device.connect() returns a Call object
      const call = await device.connect({ params });
      ret.innerHTML =   '';
      // add listeners to the Call
      // "accepted" means the call has finished connecting and the state is now "open"
      call.on("accept", updateUIAcceptedOutgoingCall);
      call.on("disconnect", updateUIDisconnectedOutgoingCall);
      call.on("cancel", updateUIDisconnectedOutgoingCall);

      outgoingCallHangupButton.onclick = () => {
        stop();
        log("Hanging up ...");
        call.disconnect();
      };

    } else {
      log("Unable to make call.");
    }
  }

  const ret = document.getElementById("timer");

  
  let counter = 0;
  let interval;
  
  function stop() {
    // ret.classList.add("d-none");
    ret.innerHTML =   'Call ended ';
    clearInterval(interval);
    $('#send_message').html('<div class="spinner-border text-light" role="status"><span class="sr-only">Loading...</span></div>');
			var message = 'Call Ended. Talk time : ' + convertSec(counter++);
				
  }
  
  function convertSec(cnt) {
    let sec = cnt % 60;
    let min = Math.floor(cnt / 60);
    if (sec < 10) {
      if (min < 10) {
        return "0" + min + ":0" + sec;
      } else {
        return min + ":0" + sec;
      }
    } else if ((min < 10) && (sec >= 10)) {
      return "0" + min + ":" + sec;
    } else {
      return min + ":" + sec;
    }
  }
  
  function start() {
    ret.classList.remove("d-none");
    $('#send_message').html('<div class="spinner-border text-light" role="status"><span class="sr-only">Loading...</span></div>');
			var message = 'Call Started';
			


     counter = 0;
    interval = setInterval(function() {
      ret.innerHTML =   'Call in progress: ' + convertSec(counter++); // timer start counting here...
    }, 1000);
  }

  // start_timer.onclick = (e) => {
  //   start();
  // };

  // stop_timer.onclick = (e) => {
  //   stop();
  // };

  function updateUIAcceptedOutgoingCall(call) {
    log("Call in progress ...");
    start();
    callButton.disabled = true;
    callButton.classList.remove("call_shake");
    calling_text.classList.add("d-none");
   
    outgoingCallHangupButton.classList.remove("d-none");
    volumeIndicators.classList.remove("hide");
    bindVolumeIndicators(call);
  }

  function updateUIDisconnectedOutgoingCall() {
    log("Call disconnected.");
    stop();

    callButton.disabled = false;
    callButton.classList.remove("call_shake");
    calling_text.classList.add("d-none");
    outgoingCallHangupButton.classList.add("d-none");
    volumeIndicators.classList.add("hide");
  }

  // HANDLE INCOMING CALL

  function handleIncomingCall(call) {
    log(`Incoming call from ${call.parameters.From}`);

    //show incoming call div and incoming phone number
    incomingCallDiv.classList.remove("hide");
    incomingPhoneNumberEl.innerHTML = call.parameters.From;

    //add event listeners for Accept, Reject, and Hangup buttons
    incomingCallAcceptButton.onclick = () => {
      acceptIncomingCall(call);
    };

    incomingCallRejectButton.onclick = () => {
      rejectIncomingCall(call);
    };

    incomingCallHangupButton.onclick = () => {
      hangupIncomingCall(call);
    };

    // add event listener to call object
    call.on("cancel", handleDisconnectedIncomingCall);
    call.on("disconnect", handleDisconnectedIncomingCall);
    call.on("reject", handleDisconnectedIncomingCall);
  }

  // ACCEPT INCOMING CALL

  function acceptIncomingCall(call) {
    call.accept();

    //update UI
    log("Accepted incoming call.");
    incomingCallAcceptButton.classList.add("hide");
    incomingCallRejectButton.classList.add("hide");
    incomingCallHangupButton.classList.remove("hide");
  }

  // REJECT INCOMING CALL

  function rejectIncomingCall(call) {
    call.reject();
    log("Rejected incoming call");
    resetIncomingCallUI();
  }

  // HANG UP INCOMING CALL

  function hangupIncomingCall(call) {
    call.disconnect();
    log("Hanging up incoming call");
    resetIncomingCallUI();
  }

  // HANDLE CANCELLED INCOMING CALL

  function handleDisconnectedIncomingCall() {
    log("Incoming call ended.");
    resetIncomingCallUI();
  }

  // MISC USER INTERFACE

  // Activity log
  function log(message) {
    logDiv.innerHTML += `<p class="log-entry">&gt;&nbsp; ${message} </p>`;
    logDiv.scrollTop = logDiv.scrollHeight;
  }

  function setClientNameUI(clientName) {
    var div = document.getElementById("client-name");
    div.innerHTML = `Your client name: <strong>${clientName}</strong>`;
  }

  function resetIncomingCallUI() {
    incomingPhoneNumberEl.innerHTML = "";
    incomingCallAcceptButton.classList.remove("hide");
    incomingCallRejectButton.classList.remove("hide");
    incomingCallHangupButton.classList.add("hide");
    incomingCallDiv.classList.add("hide");
  }

  // AUDIO CONTROLS

  async function getAudioDevices() {
    await navigator.mediaDevices.getUserMedia({ audio: true });
    updateAllAudioDevices.bind(device);
  }

  function updateAllAudioDevices() {
    if (device) {
      updateDevices(speakerDevices, device.audio.speakerDevices.get());
      updateDevices(ringtoneDevices, device.audio.ringtoneDevices.get());
    }
  }

  function updateOutputDevice() {
    const selectedDevices = Array.from(speakerDevices.children)
      .filter((node) => node.selected)
      .map((node) => node.getAttribute("data-id"));

    device.audio.speakerDevices.set(selectedDevices);
  }

  function updateRingtoneDevice() {
    const selectedDevices = Array.from(ringtoneDevices.children)
      .filter((node) => node.selected)
      .map((node) => node.getAttribute("data-id"));

    device.audio.ringtoneDevices.set(selectedDevices);
  }

  function bindVolumeIndicators(call) {
    call.on("volume", function (inputVolume, outputVolume) {
      var inputColor = "red";
      if (inputVolume < 0.5) {
        inputColor = "green";
      } else if (inputVolume < 0.75) {
        inputColor = "yellow";
      }

      inputVolumeBar.style.width = Math.floor(inputVolume * 300) + "px";
      inputVolumeBar.style.background = inputColor;

      var outputColor = "red";
      if (outputVolume < 0.5) {
        outputColor = "green";
      } else if (outputVolume < 0.75) {
        outputColor = "yellow";
      }

      outputVolumeBar.style.width = Math.floor(outputVolume * 300) + "px";
      outputVolumeBar.style.background = outputColor;
    });
  }

  // Update the available ringtone and speaker devices
  function updateDevices(selectEl, selectedDevices) {
    selectEl.innerHTML = "";

    device.audio.availableOutputDevices.forEach(function (device, id) {
      var isActive = selectedDevices.size === 0 && id === "default";
      selectedDevices.forEach(function (device) {
        if (device.deviceId === id) {
          isActive = true;
        }
      });

      var option = document.createElement("option");
      option.label = device.label;
      option.setAttribute("data-id", id);
      if (isActive) {
        option.setAttribute("selected", "selected");
      }
      selectEl.appendChild(option);
    });
  }
});


        $(document).ready(function () {
            $('#startup-button').trigger('click');
          
        });
        	
    </script>
