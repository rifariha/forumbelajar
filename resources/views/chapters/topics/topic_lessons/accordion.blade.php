<div class="col-md-12">

            <!-- /.box-header -->
            <div class="box-body">
              <div class="box-group" id="accordion">
                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                <?php $no = 1;?>
                @foreach($topicLessons as $lesson)
                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?=$no?>">
                        Pelajaran Ke - <?= $no ?>
                      </a>
                    </h4>
                  </div>
                  <div id="collapse<?=$no?>" class="panel-collapse collapse">
                    <div class="box-body">
                      <?=$lesson->lesson ?>
                    </div>
                        <div class='btn-group' style="display: flex; justify-content: flex-end">
                            @can('edit-pelajaran')
                            <a href="{{ route('topicLessons.edit', [$topic->chapter->id,$topic->id,$lesson->id]) }}" class='btn btn-default btn-md'>
                                Edit
                            </a>
                            @endcan
                            @can('hapus-pelajaran')
                            <form action="{{ route('topicLessons.destroy',[$topic->chapter_id,$topic->id,$lesson->id]) }}" method="post">
                              <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                              <button class="btn btn-danger btn-md" type="submit">Hapus</button>
                            </form>
                            @endcan
                        </div>
                  </div>
                </div>
                <?php $no++;?>
                @endforeach
              </div>
            </div>

          <!-- /.box -->
        </div>