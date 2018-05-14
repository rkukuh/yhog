/******************************************************************************/
/* CONFIRMATION DIALOG
/******************************************************************************/

$(document.body).on('click', '.remove-confirm', function(event) {
    event.preventDefault();
    var $form = $(this).closest('form');

    swal({
        title               : 'Sure want to remove ?',
        type                : 'question',
        showCancelButton    : true,
        confirmButtonColor  : '#d9534f',
        confirmButtonText   : 'Yes, Remove',
        cancelButtonText    : 'Cancel',
        closeOnConfirm      : false
    }).then(function(isConfirm) {
        if (isConfirm) {
            $form.submit();
        }
    })
});

$(document.body).on('click', '.archive-confirm', function(event) {
    event.preventDefault();
    var $form = $(this).closest('form');

    swal({
        title               : 'Sure want to archive ?',
        text                : 'This will also archive any current progress related to this affiliate.',
        type                : 'question',
        showCancelButton    : true,
        confirmButtonColor  : '#d9534f',
        confirmButtonText   : 'Yes, Archive',
        cancelButtonText    : 'Cancel',
        closeOnConfirm      : false
    }).then(function(isConfirm) {
        if (isConfirm) {
            $form.submit();
        }
    })
});


$(function() {

    /******************************************************************************/
    /* HIGHLIGHT NAVBAR MENU BASED-ON ACTIVE URL
    /******************************************************************************/

    // Get base url since it depends on app's domain name
    var base_url = window.location.origin;

    // Get full url as a string to be able to manipulate then
    var full_url = window.location.toString();

    /*** Start highlighting an active navbar menu ***/

    if (full_url.indexOf('admin/dashboard') > -1) {
        $('ul.sidebar-menu > li > a[href="' + base_url + '/admin/dashboard"]').parent().addClass('active');
    }

    if (full_url.indexOf('admin/post') > -1) {
        $('ul.sidebar-menu > li.treeview > a[href="#blog"]').parent().addClass('active');
        $('ul.sidebar-menu > li.treeview > ul.treeview-menu > li > a[href="' + base_url + '/admin/post"]').parent().addClass('active');
    }
    
    if (full_url.indexOf('admin/category-post') > -1) {
        $('ul.sidebar-menu > li.treeview > a[href="#blog"]').parent().addClass('active');
        $('ul.sidebar-menu > li.treeview > ul.treeview-menu > li > a[href="' + base_url + '/admin/category-post"]').parent().addClass('active');
    }


    if (full_url.indexOf('admin/gallery') > -1) {
        $('ul.sidebar-menu > li.treeview > a[href="#gallery"]').parent().addClass('active');
        $('ul.sidebar-menu > li.treeview > ul.treeview-menu > li > a[href="' + base_url + '/admin/gallery"]').parent().addClass('active');
    }

    if (full_url.indexOf('admin/category-gallery') > -1) {
        $('ul.sidebar-menu > li.treeview > a[href="#gallery"]').parent().addClass('active');
        $('ul.sidebar-menu > li.treeview > ul.treeview-menu > li > a[href="' + base_url + '/admin/category-gallery"]').parent().addClass('active');
    }


    if (full_url.indexOf('admin/category-event') > -1) {
        $('ul.sidebar-menu > li.treeview > a[href="#event"]').parent().addClass('active');
        $('ul.sidebar-menu > li.treeview > ul.treeview-menu > li > a[href="' + base_url + '/admin/category-event"]').parent().addClass('active');
    }

    if (full_url.indexOf('admin/event') > -1) {
        $('ul.sidebar-menu > li.treeview > a[href="#event"]').parent().addClass('active');
        $('ul.sidebar-menu > li.treeview > ul.treeview-menu > li > a[href="' + base_url + '/admin/event"]').parent().addClass('active');
    }


    if (full_url.indexOf('admin/partner') > -1) {
        $('ul.sidebar-menu > li > a[href="' + base_url + '/admin/partner"]').parent().addClass('active');
    }

    if (full_url.indexOf('admin/category-partner') > -1) {
        $('ul.sidebar-menu > li.treeview > a[href="#partner"]').parent().addClass('active');
        $('ul.sidebar-menu > li.treeview > ul.treeview-menu > li > a[href="' + base_url + '/admin/category-partner"]').parent().addClass('active');
    }
    

    if (full_url.indexOf('admin/donation') > -1) {
        $('ul.sidebar-menu > li > a[href="' + base_url + '/admin/donation"]').parent().addClass('active');
    }

    if (full_url.indexOf('admin/category-donation') > -1) {
        $('ul.sidebar-menu > li.treeview > a[href="#donation"]').parent().addClass('active');
        $('ul.sidebar-menu > li.treeview > ul.treeview-menu > li > a[href="' + base_url + '/admin/category-donation"]').parent().addClass('active');
    }


    if (full_url.indexOf('admin/advertisement') > -1) {
        $('ul.sidebar-menu > li > a[href="' + base_url + '/admin/advertisement"]').parent().addClass('active');
    }


    if (full_url.indexOf('admin/tag') > -1) {
        $('ul.sidebar-menu > li.treeview > a[href="#setting"]').parent().addClass('active');
        $('ul.sidebar-menu > li.treeview > ul.treeview-menu > li > a[href="' + base_url + '/admin/tag"]').parent().addClass('active');
    }

    if (full_url.indexOf('admin/user') > -1) {
        $('ul.sidebar-menu > li.treeview > a[href="#setting"]').parent().addClass('active');
        $('ul.sidebar-menu > li.treeview > ul.treeview-menu > li > a[href="' + base_url + '/admin/user"]').parent().addClass('active');
    }

});