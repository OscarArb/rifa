<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://www.paypal.com/sdk/js?client-id=AbIgHzOepkA0qCw6Fo5tzzvrEoiXVylLSwgluEgNb_q_bt0Am-H7FJ-8DP_8VqIyaV2sF3H8pXdiQfZv&currency=USD"></script>
</head>
<body>
   <div id="paypal-button-container"></div>
   <script>
    paypal.Buttons({
        style:{color: 'blue',
                shape: 'pill',
                label: 'pay'
        },
        createOrder: function(data, actions){
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: 10
                    }
                }]

            });
        },
        onApprove:function(data, actions){
            actions.order.capture().then(function (detalles){
                window.location.href="completado.html"
            });
        },

        onCancel: function(data) {
            alert("Pago Cancelado");
            console.log(data);
        }
    }).render('#paypal-button-container');
   </script>
    
</body>
</html>