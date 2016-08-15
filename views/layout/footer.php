
    <script src="/assets/bootstrap/js/jquery.min.js"></script>
    <script src="/assets/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
           var activeTab = $(e.target).text();
          var previousTab = $(e.relatedTarget).text(); 
          $(".tab-active span").html(activeTab);
          $(".tab-previous span").html(previousTab);
        });
      });
    </script>
</body></html> 