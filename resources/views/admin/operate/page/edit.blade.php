@extends('admin.layout')

@section('content')

<?php
    if(!isset($data)) $data = array();
    if(!$data && session("data")){
        $data = session("data");
    }
    if(!$data && session('_old_input')){
        $data = session("_old_input");
    }
    if(!isset($data['target'])) {
        $data['target'] = '_blank';
    }
?>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-sm-12">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<h5><?php echo isset($data['id']) ? '编辑' : '添加'; ?>页面参数</h5>
					<div class="ibox-tools">
						<a class="collapse-link"> <i class="fa fa-chevron-up"></i>
						</a>
					</div>
				</div>
				<div class="ibox-content">
                    @if(role('Operate/Page/index'))
				    <div class="row">
    					<div class="col-sm-3 pull-right">
    					   <a href="{{ U('Operate/Page/index')}}" class="btn btn-sm btn-primary pull-right">返回列表</a>
    					</div>
					</div>
                    @endif

		            <div class="row">
                        <div class="col-lg-10">
                            <form name="form_product" id="form-validation" action="" class="form-horizontal form-validation" accept-charset="UTF-8" method="post">
        
                               <div class="form-group">
                                    <label class="control-label col-sm-3">页面</label>
                                    <div class="col-sm-9">
                                        <input id="c_page" name="data[page]" <?php if(isset($data['id'])){ echo ' readOnly '; } ?> class="form-control" value="{{ $data['page'] or ''}}" required="" aria-required="true"  placeholder="输入页面地址不带域名">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">KEY</label>
                                    <div class="col-sm-9">
                                        <input id="c_name" name="data[key]" <?php if(isset($data['id'])){ echo ' readOnly '; } ?> class="form-control" value="{{ $data['key'] or ''}}" required="" aria-required="true"  >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">名称</label>
                                    <div class="col-sm-9">
                                        <input id="c_name" name="data[name]" <?php if(isset($data['id'])){ echo ' readOnly '; } ?> class="form-control" value="{{ $data['name'] or ''}}" required="" aria-required="true"  placeholder="名称">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">内容</label>
                                    <div class="col-sm-9">
                                        <textarea name="data[content]" id="editorContent" required="" aria-required="true" class="form-control" rows="10"><?php if(isset($data['content'])){echo $data['content'];} ?></textarea>
                                        <?php 
                                            echo editor('editorContent', ['position' => 'ali', 'folder' => 'upload/page'], ['themeType' => 'simple', 'height' => '300px']);
                                        ?>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="control-label col-sm-3">&nbsp;</label>
                                    <div class="col-sm-9">
                                        <input type="hidden" name="_referer" value="<?php echo urlencode($_SERVER['HTTP_REFERER']);?>"/>
                                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"/>
                                        <input type="submit" class="btn btn-success" style="margin-right:20px;">
                                        <input type="reset" class="btn btn-default" >
                                    </div>
                                </div>
        
                            </form>
                        </div>
                        <!-- /.col-lg-10 -->
                    </div>
                    <!-- /.row -->
				</div>
			</div>
		</div>
	</div>
</div>

@endsection