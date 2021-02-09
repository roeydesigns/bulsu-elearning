</div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2021 <a href="../index.php">BulSU iLearn</a>.</strong> All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.1
    </div>
  </footer>
</div>

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="../plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="../plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="../plugins/moment/moment.min.js"></script>
<script src="../plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="../plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="../plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="../plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="../plugins/dropzone/min/dropzone.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- Summernote -->
<script src="../plugins/summernote/summernote-bs4.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- Page specific script -->
<script>

  $(function () {

    // Summernote
    $('#summernote').summernote()
    $('#mvgsummernote').summernote()

    $("[data-toggle='tooltip']").tooltip();

    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });
    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

  })
  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  });

  // DropzoneJS Demo Code Start
  Dropzone.autoDiscover = false;

  // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
  var previewNode = document.querySelector("#template");
  previewNode.id = "";
  var previewTemplate = previewNode.parentNode.innerHTML;
  previewNode.parentNode.removeChild(previewNode);

  var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
    url: "/target-url", // Set the url
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 20,
    previewTemplate: previewTemplate,
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: "#previews", // Define the container to display the previews
    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
  });

  myDropzone.on("addedfile", function(file) {
    // Hookup the start button
    file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file); };
  });

  // Update the total progress bar
  myDropzone.on("totaluploadprogress", function(progress) {
    document.querySelector("#total-progress .progress-bar").style.width = progress + "%";
  });

  myDropzone.on("sending", function(file) {
    // Show the total progress bar when upload starts
    document.querySelector("#total-progress").style.opacity = "1";
    // And disable the start button
    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled");
  });

  // Hide the total progress bar when nothing's uploading anymore
  myDropzone.on("queuecomplete", function(progress) {
    document.querySelector("#total-progress").style.opacity = "0";
  });

  // Setup the buttons for all transfers
  // The "add files" button doesn't need to be setup because the config
  // `clickable` has already been specified.
  document.querySelector("#actions .start").onclick = function() {
    myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED));
  };
  document.querySelector("#actions .cancel").onclick = function() {
    myDropzone.removeAllFiles(true);
  };
  // DropzoneJS Demo Code End
</script>
<?php 
 if(basename($_SERVER["PHP_SELF"]) == "question-add.php" ) { ?>
<script type="text/javascript">

$(document).ready(function(){

    var counter = 2;
    $('select#QselectType').on('change', function() {
      if (this.value =="Short Answer"){
        document.getElementById("Qchoices").style.display = "none";
        document.getElementById("QSanswer").style.display = "block";
      }

      else if (this.value =="Multiple Choice"){
        document.getElementById("Qchoices").style.display = "block";
        document.getElementById("QSanswer").style.display = "none";
      }

    });
    $("#Qchoices-Addbtn").click(function () {

    if(counter>10){
            alert("Sorry, Only 10 Choices is Allowed");
            return false;
    }   
    document.getElementById("QremoveBtn").style.display = "inline-block";
    $("#Qchoices").append('<div class="input-group pt-2" id="QchoicesDiv' + counter + '"><div class="input-group-prepend"><span class="input-group-text"><input id="QchoicesCheck' + counter + '" name="questionChoicesCheckbox' + counter + '" type="hidden" value ="0"><input type="checkbox" id="QchoicesCheck' + counter + '" value ="1" name="questionChoicesCheckbox' + counter + '"></span></div><input type="text" id="QchoicesDesc' + counter + '" name="questionChoicesDescription[]" class="form-control" placeholder="Choice Description"></div>')
                
    counter++;
     });

     $("#QremoveBtn").click(function () {
        counter--;

        if(counter==1){
          document.getElementById("QremoveBtn").style.display = "none";
          return false;
        }
        if(counter==2){
          document.getElementById("QremoveBtn").style.display = "none";
        }
        $("#QchoicesDiv" + counter).remove();
            
     });

  });

</script>

<?php }?>
<?php if(basename($_SERVER["PHP_SELF"]) == "calendar.php" ||basename($_SERVER["PHP_SELF"]) == "index.php" ) { ?>
<!-- jQuery UI -->
<script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- fullCalendar 2.2.5 -->
<script src="../plugins/moment/moment.min.js"></script>
<script src="../plugins/fullcalendar/main.js"></script>
<script>
  $(function () {
    

    /* initialize the external events
     -----------------------------------------------------------------*/
    function ini_events(ele) {
      ele.each(function () {

        // create an Event Object (https://fullcalendar.io/docs/event-object)
        // it doesn't need to have a start or end
        var eventObject = {
          title: $.trim($(this).text()) // use the element's text as the event title
        }

        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject)

        // make the event draggable using jQuery UI
        $(this).draggable({
          zIndex        : 1070,
          revert        : true, // will cause the event to go back to its
          revertDuration: 0  //  original position after the drag
        })

      })
    }

    ini_events($('#external-events div.external-event'))

    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()

    var Calendar = FullCalendar.Calendar;
    var Draggable = FullCalendar.Draggable;

    var containerEl = document.getElementById('external-events');
    var checkbox = document.getElementById('drop-remove');
    var calendarEl = document.getElementById('calendar');

    // initialize the external events
    // -----------------------------------------------------------------

    new Draggable(containerEl, {
      itemSelector: '.external-event',
      eventData: function(eventEl) {
        return {
          title: eventEl.innerText,
          backgroundColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
          borderColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
          textColor: window.getComputedStyle( eventEl ,null).getPropertyValue('color'),
        };
      }
    });


    var calendar = new Calendar(calendarEl, {
      editable: true,
      events: "fetch-calendar.php",
      selectable: true,
      headerToolbar: {
        left  : 'prev,next today',
        center: 'title',
        right : 'dayGridMonth,timeGridWeek,timeGridDay'
      },
        select: function(info) {
         var evventTitle = prompt ('('+info.startStr + ' to ' + info.endStr+')'+'Event Title:');
          if(evventTitle){
            $.ajax({
                url: "add-calendar.php",
                type: "POST",
                dataType:'json',
                data: {
                  title: evventTitle,
                  start: info.startStr,
                  end: info.endStr,
                  color: '#007bff'
                },
                success: function(data){
                 
                }
            });
            location.reload();
          }
         
        },
        eventDrop: function (info) {
          $.ajax({
                url: "update-calendar.php",
                type: "POST",
                dataType:'json',
                data: {
                  id: info.event.id,
                  title: info.event.title,
                  start: info.event.startStr,
                  end: info.event.endStr,
                  color: info.event.backgroundColor
                },
                success: function(data){
                 
                }
            });
            location.reload();
         },
        eventClick: function (info) {

          var deleteMsg = confirm("Do you really want to delete this event?");  
 
          if(deleteMsg){
            $.ajax({
                url: "delete-calendar.php",
                type: "POST",
                dataType:'json',
                data: {
                  id: info.event.id
                },
                success: function(data){
                 
                }
            });
            location.reload();
          }
        },
      themeSystem: 'bootstrap',

      eventReceive: function(info) {
           $.ajax({
                url: "add-calendar.php",
                type: "POST",
                dataType:'json',
                data: {
                  title: info.event.title,
                  start: info.event.startStr,
                  end: info.event.endStr,
                  color: info.event.backgroundColor
                },
                success: function(data){
                 
                }
            });
            location.reload();
      }

    });

    calendar.render();
    // $('#calendar').fullCalendar()

    /* ADDING EVENTS */
    var currColor = '#3c8dbc' //Red by default
    // Color chooser button
    $('#color-chooser > li > a').click(function (e) {
      e.preventDefault()
      // Save color
      currColor = $(this).css('color')
      // Add color effect to button
      $('#add-new-event').css({
        'background-color': currColor,
        'border-color'    : currColor
      })
    })
    $('#add-new-event').click(function (e) {
      e.preventDefault()
      // Get value and make sure it is not null
      var val = $('#new-event').val()
      if (val.length == 0) {
        return
      }

      // Create events
      var event = $('<div />')
      event.css({
        'background-color': currColor,
        'border-color'    : currColor,
        'color'           : '#fff'
      }).addClass('external-event')
      event.text(val)
      $('#external-events').prepend(event)

      // Add draggable funtionality
      ini_events(event)

      // Remove event from text input
      $('#new-event').val('')
    })
  })

  
</script>
<?php }?>
<?php if(basename($_SERVER["PHP_SELF"]) == "index.php" ) { ?>
<!-- jQuery UI 1.11.4 -->
<script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="../dist/js/pages/dashboard.js"></script>
<script>
$(document).ready(function() {
	$('#ToDoListBtn').on('click', function() {

      var Todolist_Input = prompt('Input your To Do List: ');

    if (Todolist_Input =='' || Todolist_Input == null){
    }
    else{
			$.ajax({
				url: "todolist-save.php",
				type: "POST",
        dataType:'json',
				data: {
          todolist_content: Todolist_Input			
				},
				success: function(dataResult){
          location.reload();
				},
        complete: function(dataResult){
          location.reload();
				},
			});
    }
	});


});

function chckbxTdlist(tdlistId,tdlistChck) {
    var todolistId = tdlistId;
    var checkIfchecked = tdlistChck;
    if (checkIfchecked=='uncheck'){
			$.ajax({
				url: "todolist-check.php",
				type: "POST",
        dataType:'json',
				data: {
          todolist_check: 'check',
          todolist_id: todolistId
				},
				success: function(dataResult){
				},
			});
    }
    else if (checkIfchecked=='check') {
			$.ajax({
				url: "todolist-check.php",
				type: "POST",
        dataType:'json',
				data: {
          todolist_check: '',
          todolist_id: todolistId
				},
				success: function(dataResult){ 
				},
			});
    }
	}

  function tdlistChangeCntnt(tdlistId) {
    var todolistId = tdlistId;
    var Todolist_Input = prompt('Input your To Do List: ');

      if (Todolist_Input =='' || Todolist_Input == null){
      }
      else{
        $.ajax({
          url: "todolist-edit.php",
          type: "POST",
          dataType:'json',
          data: {
            todolist_id: todolistId,
            todolist_content: Todolist_Input
          },
          success: function(dataResult){
            location.reload();
          },
          complete: function(dataResult){
            location.reload();
          },
        });
      }
	}

  function tdlistDelete(tdlistId) {
    var todolistId = tdlistId;

			$.ajax({
				url: "todolist-delete.php",
				type: "POST",
        dataType:'json',
				data: {
          todolist_id: todolistId
				},
				success: function(dataResult){
          location.reload();
				},
        complete: function(dataResult){
          location.reload();
				},
			});
	}

</script>
<?php }?>

<?php if(basename($_SERVER["PHP_SELF"]) == "profile.php" ) { ?>
<script>
$("#EditCred").click(function () {
  document.getElementById("cred-change-btn").style.display = "inline-block";
  document.getElementById('inputUsername').disabled = false;
  document.getElementById('inputEmail').disabled = false;
  document.getElementById("EditCred").style.display = "none";
});

</script>
<?php }?>
<script>
    function ImguploadFunc(){
      document.getElementById('lessonImg').innerHTML  = document.getElementById('lessonImgInput').value;
    }

    function ProfImgUpload() {
      document.getElementById("fileProfileImgUpload").click();
    }

    function fileImgUpload() {
      document.fileImgUploadForm.submit();
      event.preventDefault();
    }
    
    function chapterViewed(userId,chapterId,lessonId) {

			$.ajax({
				url: "chapter-viewed.php",
				type: "POST",
        dataType:'json',
				data: {
          userId: userId,
          chapterId: chapterId,
          lessonId: lessonId,
          viewed: 'viewed'
				},
				success: function(dataResult){
				},
			});
    
    }

    function quizCheck(inputID,questionID,lessonID,quizID,qPoint){
      shortAnswerVal = $(inputID).val();
      var chckBtn= confirm('Are you sure you with your answer? Once you confirm you cannot go back to change your answer.');
      if (chckBtn){
        $.ajax({
				url: "quiz-checking.php",
				type: "POST",
        dataType:'json',
				data: {
          questionid: questionID,
          lessonid: lessonID,
          quizid: quizID,
          shortAnswerValue: shortAnswerVal,
          questionPoint: qPoint
				},
				success: function(dataResult){
				},
			});
      }
      else {
        event.preventDefault();
      }
    }

    function quizRadioClick(radiobtnID){
      $('#multiAns').val($(radiobtnID).val());
        
    }

    function dragTest(){
      alert('tetest');
    }

</script>
</body>
</html>
