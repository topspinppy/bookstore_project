
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<h2>แก้ไขติดต่อเรา</h2>
          <script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
          <div id="page-warpper">
              <div class="row">
                  <div class="col-lg-12">
                      <div class="form-horizontal" style="margin-top: 10px;">
                          <form id="payment-form" name="frmMain" action="contact/savefile.php?<?php echo $_SERVER['QUERY_STRING'].".txt"; ?>" method="post"  target="iframe_target">
                            <iframe id="iframe_target" name="iframe_target" src="#" style="width:0;height:0;border:0px solid #fff;"></iframe>
                              <div class="form-group">
                                  <div class="col-sm-12">
                                      <textarea id="detail" name="data" class="form-control input-sm">
                                        <?php
                                            $fp=fopen("contact/editcontactus.txt","r");
                                            fpassthru($fp);
                                        ?>
                                      </textarea>
                                        <br>
                                        <button name="btnSubmit" class="btn btn-default btn-xs" type="submit" value="Submit"><span class="glyphicon glyphicon-ok"></span> Submit </input> &nbsp;&nbsp;<button name="btnSubmit"  class="btn btn-default btn-xs" type="reset"  value="reset"> <span class="glyphicon glyphicon-remove"></span> Reset</input>
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
