@extends('front._layouts.master')
@section('title', __('front.contact_us.title'))
@section('content')

	<div class="page-header">
	    <div class="mask"></div>
	    <div class="page-header-content">
	        <div class="container">
	            <h1> اتصل بنا</h1>
	        </div>
	    </div>
	</div>
	<div class="inner-page">
	    <div class="container">
	        <div class="col-md-8 offset-md-2">
	            <div class="contact-section">
	                <div class="contact-head">
	                    <h2>بيانات الاتصال</h2>
	                    <p>
	                        سيت يتبيرسبايكياتيس يوندي أومنيس أستي ناتيس أيررور سيت فوليبتاتيم أكيسأنتييوم

	                        دولاريمكيو لايودانتيوم,توتام ريم أبيرأم,أيكيو أبسا كيواي أب أللو أنفينتوري فيرأتاتيس ايت

	                        تا سيونت أكسبليكابو. نيمو أنيم أبسام
	                    </p>
	                </div>

	                <div class="row">
	                    <div class="col-md-4 contact-info-block">
	                        <i class="ti-mobile"></i>
	                        <h4>الهاتف & الفاكس</h4>
	                        <p>
	                            (+32) 123 456 7891 <br>
	                            (+32) 123 456 7891 (Fax)
	                        </p>
	                    </div>
	                    <div class="col-md-4 contact-info-block">
	                        <i class="ti-email"></i>
	                        <h4> البريد الالكتروني</h4>
	                        <p>
	                            admin@domain.com <br>
	                            support@domain.com
	                        </p>
	                    </div>
	                    <div class="col-md-4 contact-info-block">
	                        <i class="ti-timer"></i>
	                        <h4> ساعات العمل</h4>
	                        <p>
	                            Mon–Fri : 9 am to 8 pm <br>
	                            Sat : 9 am to 12 pm
	                        </p>
	                    </div>
	                </div>
	                <div class="contact-form">
	                    <form action="" method="">
	                        <h3>ارسل رسالة</h3>
	                        <div class="row">
	                            <div class="col-md-6">
	                                <div class="form-group">
	                                    <input type="text" name="fullname" placeholder="الاسم كامل" required="">
	                                </div>
	                            </div>
	                            <div class="col-md-6">
	                                <div class="form-group">
	                                    <input type="text" name="email" placeholder="البريد الالكتروني" required="">
	                                </div>
	                            </div>
	                            <div class="col-md-12">
	                                <div class="form-group">
	                                    <input type="text" name="" placeholder="الموضوع" required="">
	                                </div>
	                            </div>
	                            <div class="col-md-12">
	                                <div class="form-group">
	                                    <textarea placeholder="الرسالة"></textarea>
	                                </div>
	                            </div>
	                            <div class="col-md-12">
	                                <div class="form-group btn-box">
	                                    <button class="btn btn-sign-up" type="submit">ارسل الرسالة</button>
	                                </div>
	                            </div>
	                        </div>
	                    </form>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>

@stop
