<div class="col-md-12">
        
            <div class="box-header with-border">
              <h3 class="box-title">Kirim Pesan ke Semua User Aktif</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="form-group">
                <input class="form-control" placeholder="Subject:" name="subject">
              </div>
              <div class="form-group">
                    <textarea id="compose-textarea" name="message" class="form-control ckeditor" style="height: 300px">
                      
                    </textarea>
              </div>
             
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <div class="pull-right">
                <button type="submit" class="btn btn-primary"><i class="fa fa-send"></i> Kirim</button>
              </div>
              <a href="{{ route('messages.index') }}" class="btn btn-default"><i class="fa fa-times"></i> Batalkan</a>
            </div>
            <!-- /.box-footer -->
 
          <!-- /. box -->
        </div>