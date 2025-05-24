<?php

return array(

    'sliders' => [
        'create'    => [
            'form'  => [
                'categories'    => 'الاقسام',
            ],
        ],
        'datatable' => [
            'created_at'    => 'تاريخ الآنشاء',
            'date_range'    => 'البحث بالتواريخ',
            'image'         => 'الصورة',
            'options'       => 'الخيارات',
            'status'        => 'الحالة',
            'title'         => 'العنوان',
        ],
        'form'      => [
            'description'           => 'الوصف',
            'image'                 => 'الصورة',
            'link_type'                 => 'نوع الرابط',
            'external_link'                 => 'رابط خارجي',
            'company'                 => 'شركة',
            'companies'                 => 'الشركات',
            'status'                 => 'الحالة',
            'link'                 => 'الرابط',
            'order'                 => 'الترتيب',
            'start_date'                 => 'يبدأ في',
            'end_date'                 => 'الانتهاء في',
            'instagram'             => 'انستجرام',
            'is_employees_type'     => 'خدمة الموظفين',
            'is_health_care'        => 'خدمة العناية الصحية',
            'is_house_keeping_type' => 'خدمة العمالة المنزلية',
            'lang'                  => 'longitude',
            'lat'                   => 'lattitude',
            'main_category'         => 'شركة رئيسي',
            'main_company'          => 'الاقسام الرئيسية',
            'meta_description'      => 'Meta Description',
            'meta_keywords'         => 'Meta Keywords',
            'phone'                 => 'رقم الهاتف',
            'course'                => 'كورس',
            'courses'                => 'الكورسات',
            'category'                => 'قسم',
            'categories'                => 'الأقسام',
            'tabs'                  => [
                'category_level'    => 'مستوى السلايدر',
                'company_level'     => 'مستوى القسم',
                'general'           => 'بيانات عامة',
                'seo'               => 'SEO',
            ],
            'title'                 => 'عنوان',
            'user'                  => 'المستخدم',
            'website'               => 'رابط الموقع الالكتروني',
        ],
        'routes'    => [
            'create'    => 'اضافة السلايدر',
            'index'     => 'السلايدر',
            'update'    => 'تعديل السلايدر',
        ],
        'validation' => [
            'type' => [
                'required' => 'من فضلك ادخل نوع الرابط',
                'in' => 'من فضلك ادخل نوع الرابط',
            ],
            'category' => [
                'required' => 'من فضلك اختر القسم',
            ],
            'course' => [
                'required' => 'من فضلك الكورس',
            ],
            'link' => [
                'required' => 'من فضلك ادخل الرابط',
            ],
        ],
    ],

    'aside' =>
        array(
            'attachments' => 'ملفات الكورسات',
            'attribute_sets' => 'مجموعة الصفات',
            'attribute_values' => 'قيم الصفات',
            'attributes' => 'الصفات',
            'categories' => 'الاقسام',
            'control' => 'اخرى',
            'coupons' => 'الكوبونات',
            'course_groups' => 'مرفقات الكورس',
            'course_packages' => 'باقات الكورسات',
            'courses' => 'الكورسات',
            'dashboard' => 'لوحة التحكم',
            'leasons' => 'وحدات و فيديوهات الكورسات',
            'logs' => 'عرض الاخطاء',
            'sliders' => 'إسلايدر الصور',
            'multi' =>
                array(
                    'attributes' => 'الصفات و المميزات',
                    'options' => 'الخيارات الاضافية',
                ),
            'news' => 'الاخبار',
            'option_values' => 'قيم الخيارات الاضافية',
            'options' => 'الخيارات الاضافية',
            'orders' => 'اشتراكات الطلاب',
            'pages' => 'الصفحات',
            'permissions' => 'الصلاحيات',
            'products' => 'المنتجات',
            'roles' => 'الادوار و المهام',
            'settings_tab' => 'الاعدادات',
            'store' => 'المتجر',
            'translations' => 'الترجمة',
            'users' => 'الاعضاء',
            'users_tab' => 'الاعضاء و الصلاحيات',
        ),
    'attachments' =>
        array(
            'create' =>
                array(
                    'attachment_name' => 'عنوان المرفق',
                    'attachments' => 'المرفقات',
                    'categories' => 'الاقسام',
                    'description' => 'المحتوى',
                    'files' => 'رفع الملفات',
                    'general' => 'بيانات عامة',
                    'info' => 'بيانات مرفقات الكورس',
                    'is_free' => 'هذا المرفق مجاني ؟',
                    'link' => 'الرابط',
                    'name' => 'عنوان الوحدة',
                    'price' => 'سعر الباقة',
                    'status' => 'الحالة',
                    'title' => 'اضافة مرفقات الكورسات',
                ),
            'datatable' =>
                array(
                    'created_at' => 'تاريخ الانشاء',
                    'date_range' => 'فترة زمنية',
                    'description' => 'الوصف',
                    'image' => 'الصورة',
                    'name' => 'العنوان',
                    'options' => 'خيارات',
                    'status' => 'الحالة',
                    'title' => 'العنوان',
                ),
            'edit' =>
                array(
                    'title' => 'تعديل مرفقات الكورس',
                ),
            'title' => 'مرفقات الكورسات',
            'validation' =>
                array(
                    'category_id' =>
                        array(
                            'required' => 'من فضلك اختر القسم',
                        ),
                    'description' =>
                        array(
                            'required' => 'من فضلك ادخل محتوى الصفحة',
                        ),
                    'image' =>
                        array(
                            'max' => 'من فضلك اختر صورة واحدة للكورس',
                            'required' => 'من فضلك اختر صورة للكورس',
                        ),
                    'title' =>
                        array(
                            'required' => 'من فضلك ادخل عنوان الصفحة',
                        ),
                ),
        ),
    'attribute_sets' =>
        array(
            'create' =>
                array(
                    'general' => 'بيانات عامة',
                    'info' => 'بيانات مجموعة الصفات',
                    'name' => 'العنوان',
                    'status' => 'الحالة',
                    'title' => 'اضافة مجموعة الصفات',
                ),
            'datatable' =>
                array(
                    'created_at' => 'تاريخ الانشاء',
                    'date_range' => 'فترة زمنية',
                    'description' => 'الوصف',
                    'name' => 'العنوان',
                    'options' => 'خيارات',
                    'status' => 'الحالة',
                    'title' => 'العنوان',
                ),
            'edit' =>
                array(
                    'title' => 'تعديل مجموعة الصفات',
                ),
            'title' => 'مجموعة الصفات',
            'validation' =>
                array(
                    'title' =>
                        array(
                            'required' => 'من فضلك ادخل عنوان مجموعة الصفات',
                        ),
                ),
        ),
    'attribute_values' =>
        array(
            'create' =>
                array(
                    'attributes' => 'الصفة',
                    'general' => 'بيانات عامة',
                    'info' => 'بيانات قيم الصفات',
                    'name' => 'القيمة',
                    'status' => 'الحالة',
                    'title' => 'اضافة قيم للصفات',
                ),
            'datatable' =>
                array(
                    'created_at' => 'تاريخ الانشاء',
                    'date_range' => 'فترة زمنية',
                    'description' => 'الوصف',
                    'name' => 'القيمة',
                    'options' => 'خيارات',
                    'status' => 'الحالة',
                    'title' => 'القيمة',
                ),
            'edit' =>
                array(
                    'title' => 'تعديل بيانات القيم للصفات',
                ),
            'title' => 'قيم الصفات',
            'validation' =>
                array(
                    'title' =>
                        array(
                            'required' => 'من فضلك ادخل عنوان القيمة',
                        ),
                ),
        ),
    'attribute_valuess' =>
        array(
            'validation' =>
                array(
                    'attribute_id' =>
                        array(
                            'required' => 'من فضلك اختر الصفة لهذه القيمة',
                        ),
                ),
        ),
    'attributes' =>
        array(
            'create' =>
                array(
                    'attribute_sets' => 'مجموعة الصفات',
                    'categories' => 'الاقسام',
                    'general' => 'بيانات عامة',
                    'info' => 'بيانات الصفات',
                    'is_filterable' => 'قابل للبحث',
                    'name' => 'العنوان',
                    'order' => 'ترتيب قيم الصفات',
                    'other' => 'اخرى',
                    'sort-btn' => 'ترتيب',
                    'status' => 'الحالة',
                    'title' => 'اضافة الصفات',
                ),
            'datatable' =>
                array(
                    'attribute_set' => 'مجموعة الصفات',
                    'created_at' => 'تاريخ الانشاء',
                    'date_range' => 'فترة زمنية',
                    'description' => 'الوصف',
                    'name' => 'العنوان',
                    'options' => 'خيارات',
                    'status' => 'الحالة',
                    'title' => 'العنوان',
                ),
            'edit' =>
                array(
                    'title' => 'تعديل الصفات',
                ),
            'title' => 'الصفات',
            'validation' =>
                array(
                    'attribute_set_id' =>
                        array(
                            'required' => 'من فضلك اختر مجموعة الصفات لهذه الصفة',
                        ),
                    'title' =>
                        array(
                            'required' => 'من فضلك ادخل عنوان الصفة',
                        ),
                ),
        ),
    'categories' =>
        array(
            'create' =>
                array(
                    'category_level' => 'مستوى القسم',
                    'description' => 'المحتوى',
                    'general' => 'بيانات عامة',
                    'image' => 'الصورة',
                    'info' => 'بيانات القسم',
                    'main_tree' => 'قسم رئيسي',
                    'name' => 'العنوان',
                    'status' => 'الحالة',
                    'coming_soon' => 'قريبا',
                    'title' => 'اضافة اقسام',
                ),
            'datatable' =>
                array(
                    'created_at' => 'تاريخ الانشاء',
                    'date_range' => 'فترة زمنية',
                    'description' => 'الوصف',
                    'image' => 'الصورة',
                    'name' => 'العنوان',
                    'options' => 'خيارات',
                    'status' => 'الحالة',
                    'title' => 'العنوان',
                ),
            'edit' =>
                array(
                    'title' => 'تعديل القسم',
                ),
            'title' => 'الاقسام',
            'validation' =>
                array(
                    'category_id' =>
                        array(
                            'required' => 'يجب تحديد مستوى القسم',
                        ),
                    'description' =>
                        array(
                            'required' => 'من فضلك ادخل محتوى القسم',
                        ),
                    'image' =>
                        array(
                            'max' => 'يجب عليك اختيار صورة واحده فقط',
                        ),
                    'title' =>
                        array(
                            'required' => 'من فضلك ادخل عنوان القسم',
                        ),
                ),
        ),
    'coupons.coupons.create. is_fixed_price' => 'خصم ثابت',
    'coupons' =>
        array(
            'coupons' =>
                array(
                    'create' =>
                        array(
                            'code' => 'كود الكوبون',
                            'percent' => 'نسبة مئوية',
                        ),
                ),
            'create' =>
                array(
                    'code' => 'كود الكوبون',
                    'description' => 'المحتوى',
                    'expire_date' => 'تاريخ انتهاء الكوبون',
                    'general' => 'بيانات عامة',
                    'info' => 'بيانات الكوبونات',
                    'is_fixed_price' => 'خصم ثابت',
                    'name' => 'العنوان',
                    'percent' => 'نسبة مئوية',
                    'price' => 'قيمة الخصم الثابت',
                    'status' => 'الحالة',
                    'title' => 'اضافة الكوبونات',
                ),
            'datatable' =>
                array(
                    'code' => 'كود الكوبون',
                    'created_at' => 'تاريخ الانشاء',
                    'date_range' => 'فترة زمنية',
                    'description' => 'الوصف',
                    'expire_date' => 'تاريخ الانتهاء',
                    'expired_date' => 'تاريخ الانتهاء',
                    'is_fixed_price' => 'خصم ثابت',
                    'name' => 'العنوان',
                    'options' => 'خيارات',
                    'percent' => 'نسبة مئوية',
                    'price' => 'قيمة الخصم الثابت',
                    'status' => 'الحالة',
                    'title' => 'العنوان',
                ),
            'edit' =>
                array(
                    'title' => 'تعديل الكوبونات',
                ),
            'title' => 'الكوبونات',
            'validation' =>
                array(
                    'description' =>
                        array(
                            'required' => 'من فضلك ادخل محتوى الصفحة',
                        ),
                    'title' =>
                        array(
                            'required' => 'من فضلك ادخل عنوان الصفحة',
                        ),
                ),
        ),
    'course' =>
        array(
            'create' =>
                array(
                    'description' => 'الوصف الكامل',
                    'top_description' => 'الوصف الآولي',
                ),
        ),
    'course_groups' =>
        array(
            'create' =>
                array(
                    'attachment_name' => 'عنوان المرفق',
                    'attachments' => 'المرفقات',
                    'categories' => 'الاقسام',
                    'description' => 'المحتوى',
                    'general' => 'بيانات عامة',
                    'info' => 'بيانات مرفقات الكورس',
                    'is_free' => 'هذا المرفق مجاني ؟',
                    'link' => 'الرابط',
                    'name' => 'عنوان الوحدة',
                    'price' => 'سعر الباقة',
                    'status' => 'الحالة',
                    'title' => 'اضافة مرفقات الكورسات',
                ),
            'datatable' =>
                array(
                    'created_at' => 'تاريخ الانشاء',
                    'date_range' => 'فترة زمنية',
                    'description' => 'الوصف',
                    'image' => 'الصورة',
                    'name' => 'العنوان',
                    'options' => 'خيارات',
                    'status' => 'الحالة',
                    'title' => 'العنوان',
                ),
            'edit' =>
                array(
                    'title' => 'تعديل مرفقات الكورس',
                ),
            'title' => 'مرفقات الكورسات',
            'validation' =>
                array(
                    'category_id' =>
                        array(
                            'required' => 'من فضلك اختر القسم',
                        ),
                    'description' =>
                        array(
                            'required' => 'من فضلك ادخل محتوى الصفحة',
                        ),
                    'image' =>
                        array(
                            'max' => 'من فضلك اختر صورة واحدة للكورس',
                            'required' => 'من فضلك اختر صورة للكورس',
                        ),
                    'title' =>
                        array(
                            'required' => 'من فضلك ادخل عنوان الصفحة',
                        ),
                ),
        ),
    'course_packages' =>
        array(
            'create' =>
                array(
                    'attachment_name' => 'العنوان',
                    'attachments' => 'باقات الكورسات',
                    'categories' => 'الاقسام',
                    'description' => 'المحتوى',
                    'general' => 'بيانات عامة',
                    'info' => 'بيانات باقات الكورسات',
                    'is_free' => 'هذا المرفق مجاني ؟',
                    'link' => 'الرابط',
                    'name' => 'العنوان',
                    'price' => 'سعر الباقة',
                    'status' => 'الحالة',
                    'title' => 'اضافة باقات الكورسات',
                ),
            'datatable' =>
                array(
                    'course' => 'الكورس',
                    'course_end_at' => 'ينتهي بتاريخ',
                    'created_at' => 'تاريخ الانشاء',
                    'date_range' => 'فترة زمنية',
                    'days' => 'عدد ايام الباقة',
                    'description' => 'الوصف',
                    'fixed_date' => 'وقت ثابت',
                    'image' => 'الصورة',
                    'name' => 'العنوان',
                    'options' => 'خيارات',
                    'price' => 'سعر الباقة',
                    'status' => 'الحالة',
                    'title' => 'العنوان',
                ),
            'edit' =>
                array(
                    'title' => 'تعديل باقات الكورس',
                ),
            'title' => 'باقات الكورسات',
            'validation' =>
                array(
                    'category_id' =>
                        array(
                            'required' => 'من فضلك اختر القسم',
                        ),
                    'description' =>
                        array(
                            'required' => 'من فضلك ادخل محتوى الصفحة',
                        ),
                    'image' =>
                        array(
                            'max' => 'من فضلك اختر صورة واحدة للكورس',
                            'required' => 'من فضلك اختر صورة للكورس',
                        ),
                    'title' =>
                        array(
                            'required' => 'من فضلك ادخل عنوان الصفحة',
                        ),
                ),
        ),
    'courses.create. course_end_at' => 'ينتهي بتاريخ',
    'courses' =>
        array(
            'create' =>
                array(
                    'attachments' => 'الفيديوهات',
                    'categories' => 'الاقسام',
                    'course_end_at' => 'ينتهي بتاريخ',
                    'days' => 'عدد ايام الباقة',
                    'demo_video' => 'الفيديو التعريفي',
                    'description' => 'المحتوى',
                    'fixed_date' => 'وقت ثابت',
                    'general' => 'بيانات عامة',
                    'info' => 'بيانات الكورس',
                    'is_free' => 'هذا الفيديو مجاني ؟',
                    'link' => 'رابط الفيديو',
                    'name' => 'العنوان',
                    'price' => 'سعر الباقة',
                    'status' => 'الحالة',
                    'title' => 'اضافة الكورسات',
                    'close' => 'إغلاق',
                    'choose' => 'إختيار',
                    'choose_video' => 'إختر الفيديو',
                    'show_video' => 'عرض الفيديو',
                ),
            'datatable' =>
                array(
                    'created_at' => 'تاريخ الانشاء',
                    'date_range' => 'فترة زمنية',
                    'description' => 'الوصف',
                    'image' => 'الصورة',
                    'name' => 'العنوان',
                    'options' => 'خيارات',
                    'status' => 'الحالة',
                    'title' => 'العنوان',
                ),
            'edit' =>
                array(
                    'title' => 'تعديل الكورس',
                ),
            'teacher' => 'المدرس',
            'title' => 'الكورسات',
            'validation' =>
                array(
                    'category_id' =>
                        array(
                            'required' => 'من فضلك اختر القسم',
                        ),
                    'demo_video' =>
                        array(
                            'required' => 'من فضلك ادخل الفيديو التعريفي',
                        ),
                    'description' =>
                        array(
                            'required' => 'من فضلك ادخل الوصف الكامل',
                        ),
                    'image' =>
                        array(
                            'max' => 'من فضلك اختر صورة واحدة للكورس',
                            'required' => 'من فضلك اختر صورة للكورس',
                        ),
                    'title' =>
                        array(
                            'required' => 'من فضلك ادخل عنوان الصفحة',
                        ),
                    'top_description' =>
                        array(
                            'required' => 'من فضلك ادخل الوصف الاولى',
                        ),
                    'user_id' =>
                        array(
                            'required' => 'من فضلك اختر المدرس',
                        ),
                ),
        ),
    'datatable' =>
        array(
            'colvis' => 'الاعمدة',
            'excel' => 'ملف اكسيل',
            'pageLength' => 'عدد الحقول',
            'pdf' => 'ملف PDF',
            'print' => 'طباعة',
        ),
    'footer' =>
        array(
            'copy_rights' => 'جميع الحقوق محفوظة',
        ),
    'front' =>
        array(
            'home' =>
                array(
                    'title' => 'الرئيسية',
                ),
        ),
    'general' =>
        array(
            'add_btn' => 'اضافة',
            'add_new' => 'اضافة جديد',
            'back_btn' => 'للخلف',
            'create_success_alert' => 'تم الاضافة بنجاح',
            'date_range' =>
                array(
                    '30days' => 'اخر ٣٠ يوم',
                    '7days' => 'اخر ٧ ايام',
                    'cancel' => 'الغاء',
                    'custom' => 'ترتيب خاص',
                    'last_month' => 'الشهر السابق',
                    'month' => 'هذا الشهر',
                    'save' => 'حفظ',
                    'today' => 'اليوم',
                    'yesterday' => 'امس',
                ),
            'delete_success_alert' => 'تم الحذف بنجاح',
            'edit_btn' => 'تعديل',
            'msg_all_delete' => 'هل تريد حذف الحقول المحددة ؟',
            'msg_delete' => 'هل تريد حذف هذا الحقل ؟',
            'no_delete' => 'لا',
            'ops_alert' => 'حدث خطا ما',
            'print_btn' => 'طباعة',
            'sorting_btn' => 'ترتيب',
            'update_success_alert' => 'تم التعديل بنجاح',
            'yes_delete' => 'نعم',
        ),
    'home' =>
        array(
            'home' => 'الرئيسية',
            'title' => 'لوحة التحكم',
            'welcome' => 'اهلا بك',
        ),
    'leasons' =>
        array(
            'create' =>
                array(
                    'attachment_name' => 'عنوان الوحدة',
                    'attachments' => 'وحدات و فيديوهات الكورسات',
                    'categories' => 'الاقسام',
                    'description' => 'المحتوى',
                    'files' => 'رفع الملفات',
                    'general' => 'بيانات عامة',
                    'info' => 'بيانات  وحدات و فيديوهات الكورسات',
                    'is_free' => 'هذا الفيديو مجاني ؟',
                    'link' => 'الرابط',
                    'name' => 'عنوان الوحدة',
                    'price' => 'سعر الباقة',
                    'sorting' => 'الترتيب',
                    'status' => 'الحالة',
                    'title' => 'اضافة  وحدات و فيديوهات الكورسات',
                    'video_title' => 'عنوان الفيديو',
                    'videos' => 'الفيديوهات',
                ),
            'datatable' =>
                array(
                    'created_at' => 'تاريخ الانشاء',
                    'date_range' => 'فترة زمنية',
                    'description' => 'الوصف',
                    'image' => 'الصورة',
                    'name' => 'العنوان',
                    'options' => 'خيارات',
                    'status' => 'الحالة',
                    'title' => 'العنوان',
                ),
            'edit' =>
                array(
                    'title' => 'تعديل  وحدات و فيديوهات الكورسات',
                ),
            'title' => 'وحدات و فيديوهات الكورسات',
            'validation' =>
                array(
                    'category_id' =>
                        array(
                            'required' => 'من فضلك اختر القسم',
                        ),
                    'description' =>
                        array(
                            'required' => 'من فضلك ادخل محتوى الصفحة',
                        ),
                    'image' =>
                        array(
                            'max' => 'من فضلك اختر صورة واحدة للكورس',
                            'required' => 'من فضلك اختر صورة للكورس',
                        ),
                    'title' =>
                        array(
                            'required' => 'من فضلك ادخل عنوان الصفحة',
                        ),
                ),
        ),
    'nav' =>
        array(
            'logout' => 'تسجيل الخروج',
            'profile' => 'الملف الشخصي',
        ),
    'news' =>
        array(
            'create' =>
                array(
                    'description' => 'المحتوى',
                    'general' => 'بيانات عامة',
                    'info' => 'بيانات الخبر',
                    'name' => 'العنوان',
                    'status' => 'الحالة',
                    'title' => 'اضافة الاخبار',
                ),
            'datatable' =>
                array(
                    'created_at' => 'تاريخ الانشاء',
                    'date_range' => 'فترة زمنية',
                    'description' => 'الوصف',
                    'image' => 'الصورة',
                    'name' => 'العنوان',
                    'options' => 'خيارات',
                    'status' => 'الحالة',
                    'title' => 'العنوان',
                ),
            'edit' =>
                array(
                    'title' => 'تعديل الخبر',
                ),
            'title' => 'الاخبار',
            'validation' =>
                array(
                    'description' =>
                        array(
                            'required' => 'من فضلك ادخل محتوى الخبر',
                        ),
                    'image' =>
                        array(
                            'max' => 'من فضلك اختر صورة واحدة للخبر',
                            'required' => 'من فضلك اختر صورة للخبر',
                        ),
                    'title' =>
                        array(
                            'required' => 'من فضلك ادخل عنوان الخبر',
                        ),
                ),
        ),
    'option_values' =>
        array(
            'create' =>
                array(
                    'general' => 'بيانات عامة',
                    'info' => 'بيانات قيم الخيارات الاضافية',
                    'name' => 'قيمة الخيار الاضافي',
                    'options' => 'الخيار الاضافي',
                    'status' => 'الحالة',
                    'title' => 'اضافة قيم للخيارات الاضافية',
                ),
            'datatable' =>
                array(
                    'created_at' => 'تاريخ الانشاء',
                    'date_range' => 'فترة زمنية',
                    'description' => 'الوصف',
                    'name' => 'القيمة',
                    'options' => 'خيارات',
                    'status' => 'الحالة',
                    'title' => 'القيمة',
                ),
            'edit' =>
                array(
                    'title' => 'تعديل بيانات القيم للخيار الاضافي',
                ),
            'title' => 'قيم  الخيار الاضافي',
            'validation' =>
                array(
                    'title' =>
                        array(
                            'required' => 'من فضلك ادخل عنوان القيمة',
                        ),
                ),
        ),
    'options' =>
        array(
            'create' =>
                array(
                    'attribute_sets' => 'مجموعة الصفات',
                    'categories' => 'الاقسام',
                    'general' => 'بيانات عامة',
                    'info' => 'بيانات الخيارات الاضافية',
                    'is_filterable' => 'قابل للبحث',
                    'name' => 'العنوان',
                    'order' => 'ترتيب قيم الخيارات الاضافية',
                    'other' => 'اخرى',
                    'sort-btn' => 'ترتيب',
                    'status' => 'الحالة',
                    'title' => 'اضافة خيارات اضافية',
                ),
            'datatable' =>
                array(
                    'attribute_set' => 'مجموعة الصفات',
                    'created_at' => 'تاريخ الانشاء',
                    'date_range' => 'فترة زمنية',
                    'description' => 'الوصف',
                    'name' => 'العنوان',
                    'options' => 'خيارات',
                    'status' => 'الحالة',
                    'title' => 'العنوان',
                ),
            'edit' =>
                array(
                    'title' => 'تعديل الخيارات الاضافية',
                ),
            'title' => 'الخيارات الاضافية',
            'validation' =>
                array(
                    'attribute_set_id' =>
                        array(
                            'required' => 'من فضلك اختر مجموعة الصفات لهذه الصفة',
                        ),
                    'title' =>
                        array(
                            'required' => 'من فضلك ادخل عنوان الخيار الاضافي',
                        ),
                ),
        ),
    'order' =>
        array(
            'datatable' =>
                array(
                    'created_at' => 'تاريخ الانشاء',
                    'date' => 'تاريخ المعاينة المطلوب',
                    'date_range' => 'فترة زمنية',
                    'options' => 'خيارات',
                    'service' => 'الخدمة المطلوبة',
                    'status' => 'الحالة',
                    'time' => 'وقت المعانية المطلوب',
                    'title' => 'العنوان',
                    'user' => 'العميل',
                ),
            'form' =>
                array(
                    'description' => 'المحتوى',
                    'general' => 'بيانات عامة',
                    'info' => 'بيانات طلبات المعاينة',
                    'show' =>
                        array(
                            'cours_end_at' => 'ينتهي بتاريخ',
                            'cours_start_at' => 'يبدا بتاريخ',
                            'cours_title' => 'الكورس',
                            'course_total' => 'سعر الاشتراك',
                            'courses_info' => 'كورسات الاشتراك',
                            'date' => 'تاريخ المعاينة المطلوب',
                            'edit' => 'تعديل و اسناد الى فني',
                            'email' => 'البريد الالكتروني',
                            'info' => 'بيانات الاشتراك',
                            'mobile' => 'الهاتف',
                            'off' => 'الخصم',
                            'preview_info' => 'بيانات المعاينة',
                            'service' => 'الخدمة المطلوبة',
                            'show_info' => 'طلبات المعاينة',
                            'subscription_info' => 'بيانات الاشتراك',
                            'subtotal' => 'المجموع',
                            'time' => 'وقت المعاينة المطلوب',
                            'total' => 'المجموع الكلي',
                            'user_info' => 'بيانات العميل',
                            'username' => 'اسم العميل',
                        ),
                    'status' => 'الحالة',
                    'title' => 'العنوان',
                ),
            'routes' =>
                array(
                    'create' => 'اضافة طلبات المعاينة',
                    'edit' => 'تعديل طلبات المعاينة',
                    'home' => 'طلبات المعاينة',
                    'show' => 'مشاهدة طلبات المعاينة',
                ),
            'validation' =>
                array(
                    'title' =>
                        array(
                            'required' => 'من فضلك ادخل العنوان',
                        ),
                ),
        ),
    'orders' =>
        array(
            'create' =>
                array(
                    'description' => 'المحتوى',
                    'general' => 'بيانات عامة',
                    'info' => 'بيانات الطلب',
                    'name' => 'العنوان',
                    'status' => 'الحالة',
                    'title' => 'اضافة الطلبات',
                ),
            'datatable' =>
                array(
                    'created_at' => 'تاريخ الانشاء',
                    'date_range' => 'فترة زمنية',
                    'description' => 'الوصف',
                    'name' => 'العنوان',
                    'options' => 'خيارات',
                    'status' => 'الحالة',
                    'title' => 'العنوان',
                    'total' => 'مبلغ الاشتراك',
                    'user' => 'المستخدم',
                ),
            'edit' =>
                array(
                    'title' => 'تعديل الطلب',
                ),
            'title' => 'الطلبات',
            'validation' =>
                array(
                    'description' =>
                        array(
                            'required' => 'من فضلك ادخل محتوى الطلب',
                        ),
                    'title' =>
                        array(
                            'required' => 'من فضلك ادخل عنوان الصفحة',
                        ),
                ),
        ),
    'pages' =>
        array(
            'create' =>
                array(
                    'description' => 'المحتوى',
                    'general' => 'بيانات عامة',
                    'info' => 'بيانات الصفحة',
                    'name' => 'العنوان',
                    'status' => 'الحالة',
                    'title' => 'اضافة صفحات',
                ),
            'datatable' =>
                array(
                    'created_at' => 'تاريخ الانشاء',
                    'date_range' => 'فترة زمنية',
                    'description' => 'الوصف',
                    'name' => 'العنوان',
                    'options' => 'خيارات',
                    'status' => 'الحالة',
                    'title' => 'العنوان',
                ),
            'edit' =>
                array(
                    'title' => 'تعديل الصفحة',
                ),
            'title' => 'الصفحات',
            'validation' =>
                array(
                    'description' =>
                        array(
                            'required' => 'من فضلك ادخل محتوى الصفحة',
                        ),
                    'title' =>
                        array(
                            'required' => 'من فضلك ادخل عنوان الصفحة',
                        ),
                ),
        ),
    'permissions' =>
        array(
            'create' =>
                array(
                    'description' => 'وصف الصلاحية',
                    'general' => 'بيانات عامة',
                    'info' => 'بيانات الصلاحية',
                    'key' => 'رمز الصلاحية',
                    'name' => 'اسم الصلاحية',
                    'title' => 'اضافة صلاحيات',
                ),
            'datatable' =>
                array(
                    'created_at' => 'تاريخ الانشاء',
                    'date_range' => 'فترة زمنية',
                    'description' => 'الوصف',
                    'name' => 'رمز المجموعة',
                    'options' => 'خيارات',
                    'title' => 'العنوان',
                ),
            'edit' =>
                array(
                    'title' => 'تعديل الصلاحية',
                ),
            'title' => 'الصلاحيات',
            'validation' =>
                array(
                    'description' =>
                        array(
                            'required' => 'من فضلك ادخل الوصف',
                        ),
                    'display_name' =>
                        array(
                            'required' => 'من فضلك ادخل رمز الصلاحية',
                            'unique' => 'هذا الرمز مدخل من قبل',
                        ),
                    'name' =>
                        array(
                            'required' => 'من فضلك ادخل اسم الصلاحية',
                            'unique' => 'هذه الصلاحية مدخلة من قبل',
                        ),
                ),
        ),
    'products' =>
        array(
            'create' =>
                array(
                    'attribute_values' => 'القيم',
                    'attributes' => 'الصفات',
                    'categories' => 'الاقسام',
                    'description' => 'المحتوى',
                    'gallery_images' => 'معرض الصور',
                    'general' => 'بيانات عامة',
                    'images' => 'الصور',
                    'info' => 'بيانات المنتج',
                    'inventory_price' => 'المخزون و السعر',
                    'main_images' => 'الصورة الرئيسية',
                    'name' => 'العنوان',
                    'new_product' => 'منتج جديد',
                    'new_product_from' => 'يبدا المنتج الجديد',
                    'new_product_to' => 'ينتهي المنتج الجديد',
                    'options' => 'الخيارات الاضافية',
                    'price' => 'سعر المنتج',
                    'qty' => 'الكمية',
                    'sku' => 'الكود - SKU',
                    'special_price' => 'سعر خاص',
                    'special_price_from' => 'يبدا السعر الخاص',
                    'special_price_to' => 'ينتهي السعر الخاص',
                    'status' => 'الحالة',
                    'title' => 'اضافة المنتجات',
                ),
            'datatable' =>
                array(
                    'created_at' => 'تاريخ الانشاء',
                    'date_range' => 'فترة زمنية',
                    'description' => 'الوصف',
                    'image' => 'الصورة',
                    'name' => 'العنوان',
                    'options' => 'خيارات',
                    'price' => 'السعر',
                    'sku' => 'الكود',
                    'status' => 'الحالة',
                    'title' => 'العنوان',
                ),
            'edit' =>
                array(
                    'title' => 'تعديل المنتج',
                ),
            'title' => 'المنتجات',
            'validation' =>
                array(
                    'category_id' =>
                        array(
                            'required' => 'من فضلك اختر قسم واحد على الاقل',
                        ),
                    'description' =>
                        array(
                            'required' => 'من فضلك ادخل محتوى المنتج',
                        ),
                    'image' =>
                        array(
                            'max' => 'من فضلك قم باختيار الصورة الرئيسية ، واحده فقط',
                            'required' => 'من فضلك قم باختيار الصورة الرئيسية للمنتج',
                        ),
                    'price' =>
                        array(
                            'required' => 'من فضلك ادخل سعر المنتج',
                        ),
                    'qty' =>
                        array(
                            'required' => 'من فضلك ادخل كمية المنتج',
                        ),
                    'sku' =>
                        array(
                            'required' => 'من فضلك ادخل كود المنتج',
                        ),
                    'title' =>
                        array(
                            'required' => 'من فضلك ادخل عنوان الصفحة',
                        ),
                ),
        ),
    'roles' =>
        array(
            'create' =>
                array(
                    'description' => 'وصف الدور',
                    'general' => 'بيانات عامة',
                    'info' => 'بيانات الدور',
                    'key' => 'رمز الدور',
                    'name' => 'العنوان',
                    'permissions' => 'الصلاحيات',
                    'title' => 'اضافة ادوار',
                ),
            'datatable' =>
                array(
                    'created_at' => 'تاريخ الانشاء',
                    'date_range' => 'فترة زمنية',
                    'description' => 'الوصف',
                    'name' => 'رمز الدور',
                    'options' => 'خيارات',
                    'permissions' => 'الصلاحيات',
                    'title' => 'العنوان',
                ),
            'edit' =>
                array(
                    'title' => 'تعديل الدور',
                ),
            'title' => 'الادوار',
            'validation' =>
                array(
                    'description' =>
                        array(
                            'required' => 'من فضلك ادخل الوصف',
                        ),
                    'display_name' =>
                        array(
                            'required' => 'من فضلك ادخل رمز الدور',
                            'unique' => 'هذا الرمز مدخل من قبل',
                        ),
                    'name' =>
                        array(
                            'required' => 'من فضلك ادخل اسم الدور',
                            'unique' => 'هذه الصلاحية مدخلة من قبل',
                        ),
                ),
        ),
    'settings' =>
        array(
            'Language_label' => 'اللغات',
            'countries_label' => 'الدول',
            'currencies_label' => 'العملات',
            'default_country' => 'الدولة الاساسية',
            'default_currency' => 'العملة الاساسية',
            'default_language' => 'اللغة الاساسية',
            'default_shipping' => 'التوصيل الثابت',
            'general' => 'عامة',
            'general_data' => 'بيانات عامة',
            'info' => 'الاعدادات',
            'logo' => 'اللوجو',
            'mail' => 'اعدادات البريد الالكتروني',
            'mail_driver' => 'Mail Driver',
            'mail_encryption' => 'Mail Encryption',
            'mail_host' => 'Mail Host',
            'mail_password' => 'Password',
            'mail_port' => 'Mail Port',
            'mail_username' => 'Username',
            'other' => 'اخرى',
            'privacy_policy' => 'الشروط و الاحكام',
            'save_buttons' => 'حفظ التغيرات',
            'shipping' => 'التوصيل',
            'shipping_label' => 'التوصيل',
            'social_media' => 'التواصل الاجتماعي',
            'supported_countries' => 'الدول المدعومة',
            'supported_currencies' => 'العملات المدعومة',
            'supported_language' => 'اللغات المدعومة',
            'title' => 'الاعدادات',
            'title_label' => 'العنوان',
        ),
    'users' =>
        array(
            'create' =>
                array(
                    'avatar' => 'الصورة الشخصية',
                    'confirm_password' => 'تآكيد كلمة المرور',
                    'email' => 'البريد الالكتروني',
                    'general' => 'بيانات عامة',
                    'image' => 'الصورة',
                    'info' => 'بيانات العضو',
                    'mobile' => 'رقم الهاتف',
                    'name' => 'اسم العضو',
                    'password' => 'كلمة المرور',
                    'roles' => 'الادوار',
                    'title' => 'اضافة اعضاء',
                ),
            'datatable' =>
                array(
                    'created_at' => 'تاريخ الانشاء',
                    'date_range' => 'فترة زمنية',
                    'email' => 'البريد الالكتروني',
                    'image' => 'الصورة',
                    'mobile' => 'الموبيل',
                    'name' => 'اسم العضو',
                    'options' => 'خيارات',
                ),
            'edit' =>
                array(
                    'title' => 'تعديل العضو',
                ),
            'title' => 'الاعضاء',
            'validation' =>
                array(
                    'email' =>
                        array(
                            'required' => 'من فضلك ادخل البريد الالكتروني',
                            'unique' => 'هذا البريد تم ادخالة من قبل',
                        ),
                    'image' =>
                        array(
                            'max' => 'يجب عليك اختيار صورة واحده فقط',
                        ),
                    'mobile' =>
                        array(
                            'numeric' => 'يجب ان يتكون رقم الموبيل من ارقام انجليزية',
                            'required' => 'من فضلك ادخل رقم الهاتف',
                        ),
                    'name' =>
                        array(
                            'required' => 'من فضلك ادخل اسم العضو',
                        ),
                    'password' =>
                        array(
                            'confirmed' => 'كلمة المرور غير مطابقة لكلمة التآكيد',
                            'min' => 'يجب الا تقل كلمة المرور عن ٦ احرف',
                            'required' => 'من فضلك ادخل كلمة المرور',
                        ),
                ),
        ),

);
