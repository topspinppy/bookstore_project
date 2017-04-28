<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  </head>
  <body>
    <br>
    <br>
    <div class="container">
      <form>
          <div class="form-group">
              <label for="Product_name" class="col-sm-2 control-label required">ชื่อสินค้า <span class="required">*</span></label>
              <div class="col-sm-4">
                     <input type="text" id="name" name="name" class="form-control input-sm" data-validation="required" value="KASPERSKY INTERNET SECURITY 2015" >
              </div>
          </div>
          <div class="form-group">
              <label for="Product_name" class="col-sm-2 control-label required">ราคาสินค้า <span class="required">*</span></label>
              <div class="col-sm-4">
                     <input type="text" id="price" name="price" class="form-control input-sm" data-validation="number" data-validation-allowing="float" value="890.00">
              </div>
          </div>
          <div class="form-group">
              <label for="Product_name" class="col-sm-2 control-label required">ยีห้อ <span class="required">*</span></label>
              <div class="col-sm-4">
                     <input type="text" id="brandname" name="brandname" class="form-control input-sm" data-validation="required" value="KASPERSKY">
              </div>
           </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </body>
</html>
