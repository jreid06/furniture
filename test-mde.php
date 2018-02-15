<?php
include dirname(__DIR__).'/furniture/scripts/dbconnect.php';
// define('ROOT_PATH', dirname(__DIR__).'/furniture/');
include ROOT_PATH.'templates/header.php';
include ROOT_PATH.'templates/nav.php';
 ?>

<br>
<br>
<br>
<br>
<textarea name="name" rows="8" cols="80" id="story"></textarea>
 <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.11/vue.js" charset="utf-8"></script> -->
 <div class="btn btn-primary" id="showHtml">show markdown in html</div>
 <div class="show-content" style="border:1px solid red; min-height: 100px; width: 100%">

 </div>
 <div class="home">

 </div>

 <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js" integrity="sha384-FzT3vTVGXqf7wRfy8k4BiyzvbNfeYjK+frTVqZeNDFl8woCbF0CYG6g2fMEFFo/i" crossorigin="anonymous"></script> -->
 <script src="/node_modules/simplemde/dist/simplemde.min.js" charset="utf-8"></script>

 <script type="text/javascript">
     // var simplemde = new SimpleMDE({
     //     autofocus: true,
     //     element: document.getElementById("markup-test"),
     //     spellChecker: false,
     //     hideIcons: ["guide"],
     //     placeholder: "Text in markdown...",
     //     autosave: {
     //       enabled: true,
     //       uniqueId: "1",
     //       delay: 15000,
     //       },
     //     renderingConfig: {
     //           singleLineBreaks: true,
     //           codeSyntaxHighlighting: true,
     //       }
     //  }
     // );


 </script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>

 <!-- ONLINE BS js -->
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

 <!-- OFFLINE BS js -->
 <script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
 <!-- <script src="/bootstrap-4.0.0-alpha.6-dist/js/tether.min.js"></script> -->
 <!-- <script src="/bootstrap-4.0.0-alpha.6-dist/js/bootstrap.min.js"></script> -->
 <script src="/js/jquery-mousewheel/jquery.mousewheel.min.js" charset="utf-8"></script>

 <!-- font awsome -->
 <!-- <script src="https://use.fontawesome.com/7c0f3e2f67.js"></script> -->

 <script src="/js/plugins/velocity.js"></script>
 <script src="/js/plugins/notify.min.js"></script>
 <script src="/js/plugins/jqueryrotate.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>

 <!-- Compiled and minified JavaScript -->

 <script src="/js/classes.js"></script>
 <script src="/js/validate-forms.js"></script>
 <script src="/js/main.js"></script>
 <!-- <script src="/js/wow.min.js"></script>
 <script>
   new WOW().init();
 </script> -->

 </body>
 </html>
