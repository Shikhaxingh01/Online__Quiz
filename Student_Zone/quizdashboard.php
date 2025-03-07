<?php
include 'quizheader.php';
include 'common/link.php';

?>
<div class="row" style="...">
  <div class="col-lg-6 col-lg-push-3" style="...">
  <!-- start editing-->
 <br>
 <div class="row">
    <br>
    <div class="col-lg-2 col-lg-push-10">
           <div id="current_que" style="float:left">0</div>
           <div  style="float:left">/</div> 
           <div id="total_que" style="float:left">0</div>
    </div>
    <div class="row" style="margin-top:30px;">
       <div class="row">
           <div class="col-lg-10  col-lg-push-1" style="min-height:300px; background-color:white; color:black" id="load_questions">
           </div>
        </div>
    </div>
    <div class="row" style="margin-top:10px;">
        <div class="col-lg-6 col-lg-push-3" style="min-height:50px;">
            <div class="col-lg-12 text-center">
                  <input type="button" class="btn btn-warning" style="float:left"
                  value="previous" onclick="load_previous();">&nbsp; &nbsp;
                  <input type="button" class="btn btn-success"  style="float:right"
                   value="next" onclick="load_next();">
            </div>
        </div>
    </div>
</div>

<!-- end her editinf-->

</div>
</div>
<script type="text/javascript">
    function load_total_que(){
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function(){
            if(xmlhttp.readyState==4 && xmlhttp.status==200){
               document.getElementById("total_que").innerHTML=xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "forajax/load_total_que.php", true);
        xmlhttp.send(null);
    }
    var questionno="1";
    load_questions(questionno);
    function load_questions(questionno){
        document.getElementById("current_que").innerHTML=questionno;
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function(){
            if(xmlhttp.readyState==4 && xmlhttp.status==200){
                if(xmlhttp.responseText=="over")
                {
                    window.location="result.php";
                }
                else{
                    document.getElementById("load_questions").innerHTML=xmlhttp.responseText;
                    load_total_que();
                }
            }
        };
        xmlhttp.open("GET", "forajax/load_questions.php?questionno="+questionno, true);
        xmlhttp.send(null);
    }

    function load_previous(){
       if(questionno=="1"){
           load_questions(questionno);
       }
       else{
           questionno=eval(questionno)-1;
           load_questions(questionno);
       }
    }
    function load_next(){
      
           questionno=eval(questionno)+1;
           load_questions(questionno);
       
    }

</script>