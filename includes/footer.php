<script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );

  $('#print_approved').on('click', ()=>{
    window.print();
  });
  $('#delete_user').on('click', (event)=>{
    var del = confirm("Click ok to confirm deletion");
    if(del){
      alert('User will be deleted');
    }else{
      event.preventDefault();
    }
  })
  </script>
  <div class="clear"></div>
  <div class="footer"><span class="text">Oman Days &copy; 2018. Powered by Codebudha.</sapn></div>
</div>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/visas.js"></script>
</body>
</html>