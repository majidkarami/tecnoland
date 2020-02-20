<div class="modal fade" id="new_address" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" style="left: 27px;" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h5 class="modal-title" id="myModalLabel">آدرس جدید</h5>
            </div>
            <div class="modal-body">

                <form id="address_form" onsubmit="add_address();return false;" action="{{ url('shop/add_address') }}" method="post">
                   @csrf
                    <table class="tbl_address">

                        <tr>
                            <td colspan="2">
                                <div class="form-group">
                                    <label>نام و نام خانوادگی</label>
                                    <input name="name"  class="form-control" style="width:98%" value="{{ old('name') }}">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">

                                <span id="error_name" class="has-error"></span>

                            </td>
                        </tr>

                        <tr>
                            <td colspan="2">
                                <div class="form-group">
                                    <label>آدرس پست الکترونیکی</label>
                                    <input name="email"  class="form-control" style="width:98%" value="{{ old('email') }}">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2">

                                <span id="error_email" class="has-error"></span>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label>انتخاب استان</label><br>
                                    <select name="ostan_id"  class="select-css" onchange="get_shahr('ostan_id','shahr_list')" id="ostan_id">
                                        <option value="">انتخاب استان</option>
                                        @foreach($ostan as $key=>$value)
                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </td>
                            <td>
                                <div class="form-group">
                                    <label>انتخاب شهر</label><br>
                                    <select name="shahr_id"  class="select-css" id="shahr_list">

                                    </select>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>

                                <span id="error_ostan_id" class="has-error"></span>

                            </td>
                            <td>

                                <span id="error_shahr_id" class="has-error"></span>

                            </td>
                        </tr>


                        <tr>
                            <td>
                                <div class="form-group">
                                    <label>تلفن ثابت</label>

                                    <input type="text" name="tell" value="{{ old('tell') }}" class="form-control">
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <label>کد شهر</label>
                                    <input type="text" class="form-control" value="{{ old('tell_code') }}" name="tell_code">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>

                                <span id="error_tell" class="has-error"></span>

                            </td>
                            <td>

                                <span id="error_tell_code" class="has-error"></span>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div class="form-group">
                                    <label>شماره موبایل</label>
                                    <input type="text" value="{{ old('mobile') }}" class="form-control" name="mobile">
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <label>کد پستی</label>
                                    <input type="text" value="{{ old('zip_code') }}"  name="zip_code" class="form-control" placeholder="">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>

                                <span id="error_mobile" class="has-error"></span>

                            </td>
                            <td>

                                <span id="error_zip_code" class="has-error"></span>

                            </td>
                        </tr>


                        <tr>
                            <td colspan="2">
                                <div>
                                    <label>آدرس </label>
                                    <textarea name="address" style="width:98%" class="form-control">{{ old('address') }}</textarea>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <span id="error_address" class="has-error"></span>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2">
                                <div class="parent-btn">
                                <button class="dk-btn dk-btn-success">ثبت آدرس
                                    <i class="fa fa-edit"></i>
                                </button>
                                </div>
                            </td>
                        </tr>

                    </table>
                </form>

            </div>

        </div>
    </div>
</div>
