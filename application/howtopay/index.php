<h2>แก้ไขวิธีการสั่งซื้อ</h2>
          <script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
          <div id="page-warpper">
              <div class="row">
                  <div class="col-lg-12">
                      <div class="form-horizontal" style="margin-top: 10px;">
                          <form id="payment-form" name="frmMain" action="howtopay/savefile.php?<?php echo $_SERVER['QUERY_STRING'].".txt"; ?>" method="post"  target="iframe_target">
                            <iframe id="iframe_target" name="iframe_target" src="#" style="width:0;height:0;border:0px solid #fff;"></iframe>
                              <div class="form-group">
                                  <div class="col-sm-12">
                                      <textarea id="detail" name="data" class="form-control input-sm">
                                        <?php
                                            $fp=fopen("howtopay/edithowtopay.txt","r");
                                            fpassthru($fp);
                                        ?>
                                      </textarea>
                                        <br>
                                        <button name="btnSubmit" type="submit" value="Submit"><span class="glyphicon glyphicon-ok"></span> Submit </input> &nbsp;&nbsp;<button name="btnSubmit" type="reset" value="reset"> <span class="glyphicon glyphicon-remove"></span> Reset</input>
                                      <script>
                                          // Replace the <textarea id="editor1"> with a CKEditor
                                          // instance, using default configuration.
                                          CKEDITOR.replace('detail');
                                          function CKupdate() {
                                              for (instance in CKEDITOR.instances)
                                                  CKEDITOR.instances[instance].updateElement();
                                          }
                                      </script>
                                  </div>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
          <script type="text/javascript">
              $(document).ready(function () {
                  $("#save").click(function () {
                      $("#payment-form").submit();
                      return false;
                  });
              });
          </script>
        </div>
