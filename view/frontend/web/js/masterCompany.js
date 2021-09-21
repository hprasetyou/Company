require([
    "jquery",
    "Magento_Ui/js/modal/modal",
    "mage/url"
],function($, modal, url) {

    const options = {
        type: 'popup',
        responsive: true,
        title: 'Add Company',
        buttons: [{
            text: $.mage.__('Close'),
            class: '',
            click: function () {
                this.closeModal();
            }
        },{
            text: $.mage.__('Save'),
            class: 'action primary',
            click: function () {
                $.ajax({
                  type: "POST",
                  url: url.build('mastercompany/company/save'),
                  data: $('#companyForm').serialize()
                }).then(function(o){
                  if(o.saved){
                    window.location.reload();
                  }
                })
            }
        }
      ]
    }
    $(".company-delete-trigger").click(function(e){
      e.preventDefault()
      $.ajax({
        type: "POST",
        url: url.build('mastercompany/company/delete'),
        data: {
          id: $(this).data('id')
        }
      }).then(function(o){
        if(o.success){
          window.location.reload();
        }
      })
    })
    $(".company-form-trigger").click(function(e) {
      const formData = {
        id:'',
        name:'',
        phonenumber:''
      }
      if($(this).data('id')){
        options.title = 'Edit Company'
        formData.id = $(this).data('id')
        formData.name = $(this).data('name')
        formData.phonenumber = $(this).data('phonenumber')
      }else{
        options.title = 'Add Company'
      }
      $('#company_id').val(formData.id)
      $('#name').val(formData.name)
      $('#phonenumber').val(formData.phonenumber)
      var popup = modal(options, $('#modalCompany'));
      $('#modalCompany').modal('openModal');
    });
});
