<html>
    <head>
            <script>
      function konfirmasi(){
        if(confirm("Tambahkan Data ?"))
        document.getElementById("demo").innerHTML = "Paragraph changed!"; 
      }
    </script>
    </head>
    <body>
    <button onclick="konfirmasi()" class="btn btn-primary">Add Item </button>
    <span id="demo">aaaa</span>
    </body>
</html>