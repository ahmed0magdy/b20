<?php
function drawTable(int $numberOfRows): string
{
  $table = "<table class='table table-dark'>
              <thead>
                <tr>
                  <th >Product</th>
                  <th >Price</th>
                  <th >Quantity</th>
                </tr>
              </thead>
              <tbody>";
  for ($i = 1; $i <= $numberOfRows; $i++) {
    $table .= "<tr>
                  <th><input type='text' name='product_{$i}_name' class='form-control'></th>
                  <td><input type='number' name='product_{$i}_price' class='form-control'></td>
                  <td><input type='number' name='product_{$i}_quantity' class='form-control'></td>
              </tr>";
  }
  $table .=   "</tbody>
            </table>
            <div class='form-group'>
                    <button class='btn btn-outline-dark form-control' name='view_invoice'> Invoice </button>
            </div>";
  return $table;
}

function viewInvoice(array $data): string
{
  $table = "<table class='table table-dark text-center'>
              <thead>
                <tr>
                  <th >Product</th>
                  <th >Price</th>
                  <th >Quantity</th>
                  <th >Subtotal</th>
                </tr>
              </thead>
              <tbody>";
  $total = 0;
  for ($i = 1; $i <= $data['number_of_products']; $i++) {
    $subtotal = $data['product_' . $i . '_price'] * $data['product_' . $i . '_quantity'];
    $total += $subtotal;
    $table .= "<tr>
                  <th>{$data['product_' . $i . '_name']}</th>
                  <td>{$data['product_' . $i . '_price']}</td>
                  <td>{$data['product_' . $i . '_quantity']}</td>
                  <td>{$subtotal} EGP</td>
                </tr>";
  }
  $discount = discount($total); // 0.1
  $discountPercentage = $discount * 100; // 0.1
  $priceAfterDiscount = $total * (1 - $discount);
  $totalDiscount = $total * $discount;
  $delivery = delivery($data['city']);
  $priceAfterDelivery = $priceAfterDiscount + $delivery;
  $table .=   " <tr>
                    <td colspan=2>Name</td>
                    <td colspan=2>{$data['name']}</td>
                </tr>
                <tr>
                    <td colspan=2>City</td>
                    <td colspan=2>{$data['city']}</td>
                </tr>
                <tr>
                    <td colspan=2>Total Price</td>
                    <td colspan=2>{$total} EGP</td>
                </tr>
                <tr>
                    <td colspan=2>Discount</td>
                    <td colspan=2>{$discountPercentage}%</td>
                </tr>
                <tr>
                    <td colspan=2>Total Discount</td>
                    <td colspan=2>{$totalDiscount} EGP</td>
                </tr>
                <tr>
                    <td colspan=2>Price After Discount</td>
                    <td colspan=2>{$priceAfterDiscount} EGP</td>
                </tr>
                <tr>
                    <td colspan=2>Delivery</td>
                    <td colspan=2>{$delivery} EGP</td>
                </tr>
                <tr>
                    <td colspan=2>Final Price</td>
                    <td colspan=2>{$priceAfterDelivery} EGP</td>
                </tr>
              </tbody>
            </table>";
  return $table;
}

function discount(float $totalPrice): float
{
  if ($totalPrice < 1000) {
    $discount = 0;
  } elseif ($totalPrice >= 1000 && $totalPrice < 3000) {
    $discount = 0.1;
  } elseif ($totalPrice >= 3000 && $totalPrice < 4500) {
    $discount = 0.15;
  } else {
    $discount = 0.2;
  }
  return $discount;
}

function delivery(string $city): float
{
  if ($city == 'Cairo') {
    $delivery = 0;
  } elseif ($city == 'Giza') {
    $delivery = 30;
  } elseif ($city == 'Alex') {
    $delivery = 50;
  } else {
    $delivery = 100;
  }
  return $delivery;
}
?>
<!doctype html>
<html lang="en">

<head>
  <title>Supermarket</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <div class="col-12 text-center text-dark mt-5">
      <h1>SuperMarket</h1>
    </div>
    <div class="col-6 offset-3 mt-5">
      <form action="" method="post">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" name="name" id="name" class="form-control" value="<?= $_POST['name'] ?? "" ?>">
        </div>
        <div class="form-group">
          <label for="city">City</label>
          <select name="city" id="city" class="form-control">
            <option <?= (isset($_POST['city']) && $_POST['city'] == "Cairo") ?  "selected" : "" ?> value="Cairo">Cairo</option>
            <option <?= (isset($_POST['city']) && $_POST['city'] == "Alex") ?  "selected" : "" ?> value="Alex">Alex</option>
            <option <?= (isset($_POST['city']) && $_POST['city'] == "Giza") ?  "selected" : "" ?> value="Giza">Giza</option>
            <option <?= (isset($_POST['city']) && $_POST['city'] == "Others") ?  "selected" : "" ?> value="Others">Others</option>
          </select>
        </div>
        <div class="form-group">
          <label for="number_of_products">Number Of Products</label>
          <input type="text" name="number_of_products" id="number_of_products" class="form-control" value="<?= $_POST['number_of_products'] ?? "" ?>">
        </div>
        <div class="form-group">
          <button class="btn btn-outline-primary form-control" name="enter_products"> Enter Products </button>
        </div>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
          if (isset($_POST['enter_products'])) {
            echo drawTable($_POST['number_of_products']);
          }
          if (isset($_POST['view_invoice'])) {
            echo viewInvoice($_POST);
          }
        }
        ?>
      </form>
    </div>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>