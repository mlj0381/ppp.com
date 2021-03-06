@extends('admin.layout')

@section('content')

<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-sm-12">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<h5><?php echo isset($data['id']) ? '编辑' : '添加'; ?>部门</h5>
					<div class="ibox-tools">
						<a class="collapse-link"> <i class="fa fa-chevron-up"></i>
						</a>
					</div>
				</div>
				<div class="ibox-content">
                    @if(role('Foundation/Department/index'))
				    <div class="row">
    					<div class="col-sm-3 pull-right">
    					   <a href="{{ U('Foundation/Department/index')}}" class="btn btn-sm btn-primary pull-right">返回列表</a>
    					</div>
					</div>
                    @endif

					<div class="row">
            			<div class="col-lg-10">
                            <form name="form_product" id="form-validation" action="" class="form-horizontal form-validation" accept-charset="UTF-8" method="post">


                                <div class="form-group">
                                    <label class="control-label col-sm-3">部门名</label>
                                    <div class="col-sm-9">
                                        <input name="info[name]" class="form-control" value="{{ $data['name'] or ''}}" id="info_name" required="" aria-required="true" placeholder="部门名">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">备注</label>
                                    <div class="col-sm-9">
                                        <textarea name="info[remark]" class="form-control" id="info_mark" required="" aria-required="true" rows="3">{{ $data['remark'] or ''}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">状态</label>
                                    <div class="col-sm-9">
                                        <label class="radio-inline">
                                            <input type="radio" name="info[status]" value="0" <?php if(isset($data['status']) && $data['status'] == 0){ echo ' checked="checked"'; } ?>>禁用
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="info[status]" value="1" <?php if(isset($data['status']) && $data['status'] == 1){ echo ' checked="checked"'; } ?>>启用
                                        </label>
                                    </div>
                                </div>
 
                                <div class="form-group">
                                    <label class="control-label col-sm-3">&nbsp;</label>
                                    <div class="col-sm-9">
                                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"/>
										<input type="hidden" name="_referer" value="<?php echo urlencode($_SERVER['HTTP_REFERER']); ?>"/>
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
