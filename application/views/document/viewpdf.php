<html>
  <head>
      <meta charset="utf-8">
     <title>เอกสาร</title>
     <script src="<?php echo base_url('assets/js/pdfobject.js')?>"></script>
     <script type="text/javascript">
      window.onload = function (){
        var myPDF = new PDFObject({ url: "http://localhost/projectstudent/uploads/<?php echo $documentname ?>" }).embed();
      };
    </script>
  </head>
 </html>