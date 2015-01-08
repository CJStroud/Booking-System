/**
----------------------------------
Sidebar moving when in mobile view
----------------------------------
**/

$(function Load() {
  if ($(window).width() < 768) {
    var sidebarWidth = ( 100 * parseFloat($('.settings .sidebar').css('width')) / parseFloat($('.settings .sidebar').parent().css('width')) );
    $('#expand-sidebar').click(function NavigateSidebarClick() {
      var active = $(this).data('active');

      if (active) {
        $('.settings .sidebar').animate({
          left: (~(sidebarWidth) + 1) + '%'
        }, {
          duration: 'fast',
          queue: false
        });

        $('#settings-content').animate({
          'margin-left': '0px'
        }, {
          duration: 'fast',
          queue: false
        });

        $('#expand-sidebar').data('active', false);

      } else {
        $('.settings .sidebar').animate({
          left: '15px'
        }, {
          duration: 'fast',
          queue: false
        });

        $('#settings-content').animate({
          'margin-left': sidebarWidth + '%'
        }, {
          duration: 'fast',
          queue: false
        });

        $('#expand-sidebar').data('active', true);

      }


    });
  }

  $(window).resize(function WindowResize() {
    if ($(window).width() >= 768) {
      $('#settings-content').removeAttr('style');
      $('.settings .sidebar').removeAttr('style');
      $('#expand-sidebar').data('active', false);
    }
  });

});
