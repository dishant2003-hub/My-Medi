<!-- start of main -->
<div class="container">
    <div class="row">
        <div class="col-8 col-sm-8 col-md-8 col-lg-8">
            <div class="message-box">
                <div class="success-container">
                    <div style="padding-left: 5%; padding-right: 5%">
                        <hr>
                    </div>
                    <br>
                    <h1 class="monserrat-font" style="color: #103178;">Thank you for your order</h1>
                    <br>

                    <div class="confirm-green-box">
                        <br>
                        <h5>ORDER CONFIRMATION</h5>
                        <p>Your order has been sucessful!</p>
                        <p>Thank you for choosing Mymedi. You will shortly receive a confirmation email.</p>
                    </div>
                    <br>
                    <div class="back_button">
                        <a href="<?= base_url(''); ?>" class="button">Back to home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end of main -->


<style>
    .back_button{
        margin-top: 30px;
    }
    .button {
        margin-top: 20px;
        color: white;
        background: #FD8D27;
        text-decoration: none;
        padding: 10px 30px;
        border-radius: 20px;
    }

    .button:hover {
        background-color: white;
        border: 1px solid #FD8D27;
        color: #FD8D27;
    }

    .message-box {
        display: flex;
        justify-content: center;
        padding-top: 20vh;  
        padding-bottom: 20vh;
    }

    .success-container {
        background: white;
        height: 440px;
        width: 50%;
        box-shadow: 5px 5px 10px grey;
        text-align: center;
        margin-top: -43px;
    }

    .confirm-green-box {
        width: 100%;
        height: 140px;
        background: #F0F2F5;
    }

    .confirm-green-box h5 {
        color: #103178;
    }

    .monserrat-font {
        font-family: 'Montserrat', sans-serif;
        letter-spacing: 2px;
    }


    .main {
        width: 80vw;
        margin: 0 10vw;
        height: 50vh;
        overflow: hidden;

    }

    body {
        font-family: 'Montserrat', sans-serif;
    }

    :root {
        --background-1: #ffffff;
        --background-2: #E3E3E3;
        --background-3: #A3CCC8;
        --text-1: #000000;
        --text-2: #ffffff;
        --text-size-reg: calc(20px + (20 - 18) * ((100vw - 300px) / (1600 - 300)));
        --text-size-sml: calc(10px + (10 - 8) * ((100vw - 300px) / (1600 - 300)));
    }

    .verticle-align {
        text-align: center;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .no-style {
        padding: 0;
        margin: 0;
    }


    @media (min-width: 576px) {}

    @media (min-width: 768px) {}

    @media (min-width: 992px) {}

    @media (min-width: 1200px) {}
</style>