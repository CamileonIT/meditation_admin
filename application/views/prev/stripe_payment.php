<!DOCTYPE html>
<html>
<head>
   
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/stripe-bootstrap.min.css" />
        <script type="text/javascript" src="<?=base_url()?>assets/js/stripe-jquery.min.js"></script>
    <link rel="icon" href="<?=base_url();?>assets/images/1.png" type="image/x-icon">
    <style type="text/css">
        .panel-title {
        display: inline;
        font-weight: bold;
        }
        .form-control{
            height: 60px;
            padding: 6px 12px;
            font-size: 30px;
        }
        .form-group label{
            font-size: 30px !important
        }
        .form-group{
            margin: 15px 0;
        }.
        
        
        .display-table {
            display: table;
        }
        .display-tr {
            display: table-row;
        }
        .display-td {
            display: table-cell;
            vertical-align: middle;
            width: 70%;
            font-size: 40px;
        } 
        .btn-lg{
            font-size: 35px;
        }
        .panel-heading{
            padding: 20px 15px;
        }
        
    </style>
</head>
<body>
     
<div class="container">
     
    <br>
     <br>
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default credit-card-box">
                <div class="panel-heading" >
                    <div class="row display-tr" >
                        <h3 class="panel-title display-td" >Payment Details</h3>
                        <div class="display-td" >                            
                            <img class="img-responsive pull-right" src="<?=base_url()?>assets/images/stripe_accepted.png">
                        </div>
                    </div>                    
                </div>
                <div class="panel-body">
    
                    <?php if($this->session->flashdata('success')){ ?>
                    <div class="alert alert-success text-center">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <p><?php echo $this->session->flashdata('success'); ?></p>
                        </div>
                    <?php } ?>
                    <?php if($this->session->flashdata('error')){ ?>
                    <div class="alert alert-error text-center">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <p><?php echo $this->session->flashdata('error'); ?></p>
                        </div>
                    <?php } ?>
     
                    <form role="form" action="<?php echo base_url();?>stripePost" method="post" class="require-validation"
                                                     data-cc-on-file="false"
                                                    data-stripe-publishable-key="<?php echo $this->config->item('stripe_key') ?>"
                                                    id="payment-form">
     
                        <div class='form-row row'>
                            <div class='col-xs-12 form-group required'>
                                <label class='control-label'>Name on Card</label> <input
                                    class='form-control' id='name' value="test" placeholder="test" size='4' type='text' name="user_card_name" readonly>
                            </div>
                        </div>

                        <div class='form-row row'>
                            <div class='col-xs-12 col-md-6 form-group cvc required'>
                                <label class='control-label'>Amount</label> <input autocomplete='off' class='form-control ' id='amount'  value="<?php echo $total_package_price?>" name='amount' placeholder='50 $' size='4'
                                    type='text' value="<?php echo $total_package_price?>" name="user_amount" readonly>
                            </div>
                            
                            
                        </div>
     
                        <div class='form-row row'>
                            <div class='col-xs-12 form-group card required'>
                                <label class='control-label'>Card Number</label> <input
                                    autocomplete='off' class='form-control card-number' id='card_number' size='16' placeholder='4242424242424242'
                                    type='text'  value="4242424242424242" name="user_card_number" readonly>
                            </div>
                        </div>
      
                        <div class='form-row row'>
                            <div class='col-xs-12 col-md-4 form-group cvc required'>
                                <label class='control-label'>CVC</label> <input autocomplete='off'
                                    class='form-control card-cvc' id='card_csv' placeholder='123'   size='4'
                                    type='text' value="123" name="user_card_cvc" readonly>
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Expiration Month</label> <input
                                    class='form-control card-expiry-month' id='card_month' placeholder='12' size='2'
                                    type='text' value="12" name="user_card_expiration_month" readonly>
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Expiration Year</label> <input
                                    class='form-control card-expiry-year' id='card_year' placeholder='<?php echo date('Y', strtotime('+5 years'));?>' size='4'
                                    type='text' value="<?php echo date('Y', strtotime('+5 years'));?>" name="user_card_card_expiration_year" readonly>
                            </div>
                        </div>
                        <input type='hidden' name='package_id' value='<?php echo $package_id?>'/>
                        <input type='hidden' name='user_id' value='<?php echo $user_id?>'/>
                        <div class='form-row row'>
                            <div class='col-md-12 error form-group hide'>
                                <div class='alert-danger alert'>Please correct the errors and try
                                    again.</div>
                            </div>
                        </div>
      
                        <div class="row">
                            <div class="col-xs-12">
                                <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now </button>
                            </div>
                        </div>
                             
                    </form>
                </div>
            </div>        
        </div>
    </div>
         
</div>
     
</body>  
     
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
     
<script type="text/javascript">
$(function() {
    var $form         = $(".require-validation");
  $('form.require-validation').bind('submit', function(e) {
    var $form         = $(".require-validation"),
        inputSelector = ['input[type=email]', 'input[type=password]',
                         'input[type=text]', 'input[type=file]',
                         'textarea'].join(', '),
        $inputs       = $form.find('.required').find(inputSelector),
        $errorMessage = $form.find('div.error'),
        valid         = true;
        $errorMessage.addClass('hide');
 
        $('.has-error').removeClass('has-error');
    $inputs.each(function(i, el) {
      var $input = $(el);
      if ($input.val() === '') {
        $input.parent().addClass('has-error');
        $errorMessage.removeClass('hide');
        e.preventDefault();
      }
    });
     
    if (!$form.data('cc-on-file')) {
      e.preventDefault();
      Stripe.setPublishableKey($form.data('stripe-publishable-key'));
      Stripe.createToken({
        number: $('.card-number').val(),
        cvc: $('.card-cvc').val(),
        exp_month: $('.card-expiry-month').val(),
        exp_year: $('.card-expiry-year').val()
      }, stripeResponseHandler);
    }
    
  });
      
  function stripeResponseHandler(status, response) {
        if (response.error) {
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
        } else {
            var token = response['id'];
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
           
            
            $form.get(0).submit();
        }
    }
     
});
</script>
</html>