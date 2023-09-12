<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard GW</title>
    <link rel="stylesheet" href={{ asset('css/productsTable-styles.css')}}>
</head>
<body>
    <main>
        <h1>Responsive Table That Also Scrolls if Necessary</h1>
        <div role="region" aria-labelledby="Cap1" tabindex="0">
          <table id="Books">
            <caption id="Cap1">Books I May or May Not Have Read</caption>
            <tr>

              <th>Product ID</th>
              <th>Name</th>
              <th>Description</th>
              <th>Price</th>
              <th>Quantity - M</th>
              <th>Quantity - L</th>
              <th>Quantity - XL</th>
              <th>Total Quantity</th>
            </tr>
            @foreach ($products as $product)
            <tr>
              <td>{{$product->id}}</td>
              <td>{{$product->product_name}}</td>
              <td>{{$product->product_price}}</td>
              <td>{{$product->product_description}}</td>
              <td>{{$product->quantity_m}}</td>
              <td>{{$product->quantity_m}}</td>
              <td>{{$product->quantity_l}}</td>
              <td>{{$product->total_quantity}}</td>
            </tr>
            @endforeach
          </table>
        </div>
      
        <p>
          Note that this is an <em>accessible</em> (keyboard and screen reader) responsive (width and print) table. You can <a href="/createProduct">Create New Product</a> (so you can make your own).
        </p>
      </main>
      <script>
      function ResponsiveCellHeaders(elmID) {
        try {
          var THarray = [];
          var table = document.getElementById(elmID);
          var ths = table.getElementsByTagName("th");
          for (var i = 0; i < ths.length; i++) {
            var headingText = ths[i].innerHTML;
            THarray.push(headingText);
          }
          var styleElm = document.createElement("style"),
            styleSheet;
          document.head.appendChild(styleElm);
          styleSheet = styleElm.sheet;
          for (var i = 0; i < THarray.length; i++) {
            styleSheet.insertRule(
              "#" +
                elmID +
                " td:nth-child(" +
                (i + 1) +
                ')::before {content:"' +
                THarray[i] +
                ': ";}',
              styleSheet.cssRules.length
            );
          }
        } catch (e) {
          console.log("ResponsiveCellHeaders(): " + e);
        }
      }
      ResponsiveCellHeaders("Books");
      
      // https://adrianroselli.com/2018/02/tables-css-display-properties-and-aria.html
      // https://adrianroselli.com/2018/05/functions-to-add-aria-to-tables-and-lists.html
      function AddTableARIA() {
        try {
          var allTables = document.querySelectorAll('table');
          for (var i = 0; i < allTables.length; i++) {
            allTables[i].setAttribute('role','table');
          }
          var allRowGroups = document.querySelectorAll('thead, tbody, tfoot');
          for (var i = 0; i < allRowGroups.length; i++) {
            allRowGroups[i].setAttribute('role','rowgroup');
          }
          var allRows = document.querySelectorAll('tr');
          for (var i = 0; i < allRows.length; i++) {
            allRows[i].setAttribute('role','row');
          }
          var allCells = document.querySelectorAll('td');
          for (var i = 0; i < allCells.length; i++) {
            allCells[i].setAttribute('role','cell');
          }
          var allHeaders = document.querySelectorAll('th');
          for (var i = 0; i < allHeaders.length; i++) {
            allHeaders[i].setAttribute('role','columnheader');
          }
          // this accounts for scoped row headers
          var allRowHeaders = document.querySelectorAll('th[scope=row]');
          for (var i = 0; i < allRowHeaders.length; i++) {
            allRowHeaders[i].setAttribute('role','rowheader');
          }
          // caption role not needed as it is not a real role and
          // browsers do not dump their own role with display block
        } catch (e) {
          console.log("AddTableARIA(): " + e);
        }
      }
      
      AddTableARIA();</script>
    
</body>
</html>