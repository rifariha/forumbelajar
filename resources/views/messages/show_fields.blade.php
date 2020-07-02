<div class="col-md-12">
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="mailbox-read-info">
                <h3>{{ $message->subject }}</h3>
                <h5>From: {{ $message->sender_name }}
                  <span class="mailbox-read-time pull-right"> {{ time_since($message->created_at) }}</span></h5>
              </div>
        
              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message">
                {{ $message->message }}
              </div>
              <!-- /.mailbox-read-message -->
            </div>
            <!-- /.box-body -->
            <!-- /.box-footer -->
            <div class="box-footer">
              <div class="pull-right">
              </div>
              <button type="button" class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete</button>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /. box -->
        </div>