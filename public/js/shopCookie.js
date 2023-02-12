function getCookie(name) {
    let matches = document.cookie.match(new RegExp(
      "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
    ));
    return matches ? decodeURIComponent(matches[1]) : undefined;
  }
  function setCookie(name, value, options = {}) {

  options = {
    path: '/',
    // при необходимости добавьте другие значения по умолчанию
    ...options
  };

  if (options.expires instanceof Date) {
    options.expires = options.expires.toUTCString();
  }

  let updatedCookie = encodeURIComponent(name) + "=" + encodeURIComponent(value);

  for (let optionKey in options) {
    updatedCookie += "; " + optionKey;
    let optionValue = options[optionKey];
    if (optionValue !== true) {
      updatedCookie += "=" + optionValue;
    }
  }

  document.cookie = updatedCookie;
  }
      let cart = [];
      let prices = {};

      function commitCart(){
          setCookie("data", JSON.stringify(cart), {'max-age': 86400 * 30});
          updateTotalPrice();
      }

      function updateTotalPrice(){
          let total = calcTotal();
          let totalQuant = calcTotalQuant();
          document.querySelector("#totalPrice123").textContent = `${total} ₽`;
          document.querySelector("#totalPrice321").textContent = `${total} ₽`;
          document.querySelector("#totalQuant").textContent = totalQuant;
      }

      function calcTotalQuant(){
          let total = 0;

          for (let index = 0; index < cart.length; index++) {
              const element = cart[index];
              const item_id = element['name'];
              const item_q = element['quantity'];
              const item_price = prices[item_id];

              total += parseInt(item_q);
          }

          return total;
      }

      function calcTotal(){
          let items = document.querySelectorAll(".my_items .itemPrice");
          let total = 0;


          for (let index = 0; index < items.length; index++) {
              const element = items[index];
              prices[element.id] = parseFloat(element.textContent);
          }

          for (let index = 0; index < cart.length; index++) {
              const element = cart[index];
              const item_id = element['name'];
              const item_q = element['quantity'];
              const item_price = prices[item_id];
              total += item_price * item_q;
          }

          return total.toFixed(2);
      }



      function onAddItem(item_id, item_q) {
          item_id = item_id.replace("product", "");

          for (const key in cart) {
              let item = cart[key];
              if (item['name'] == item_id){
                  cart[key]['quantity'] = item_q;
              }
          }

      }

      $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });

          cart = JSON.parse(getCookie("data"));

          updateTotalPrice();

          $(".itemQty").change(function (event) {

              var pVal = $("#" + event.target.id).attr('name');
              var quant = document.querySelector("#" + event.target.id).value;
              console.log(pVal);
              console.log(quant);
              //window.location.reload(true);
              //location.reload(true);
              $.ajax({
                  url: 'product',
                  method: 'POST',
                  cache: false,
                  data: {
                      pVal: pVal,
                      quant: quant
                  },
                  dataType: "text",
                  success: function (response) {
                    console.log();
                      onAddItem(event.target.id, quant);
                      commitCart();
                  }
              });

          });
      });
