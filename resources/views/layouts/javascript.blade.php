  <script src="/js/app.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){ console.log('loaded');});
	$('div.alert').not('.alert-important').delay(3000).fadeOut(350);
  </script>
  @stack('scripts')  
