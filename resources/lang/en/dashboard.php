<?php

return array(
    'aside' =>
        array(
            'attribute_sets' => 'Attribute Sets',
            'attribute_values' => 'Attribute Values',
            'attributes' => 'Attributes',
            'categories' => 'Categories',
            'control' => 'Control',
            'course_groups' => 'Course Attachment',
            'courses' => 'Courses',
            'dashboard' => 'xx',
            'logs' => 'Logs Viewer',
            'sliders' => 'Slide Show',
            'multi' =>
                array(
                    'attributes' => 'Attributes Sets & Values',
                    'options' => 'Options Groups & Values',
                ),
            'news' => 'News',
            'option_values' => 'Option Values',
            'options' => 'Options',
            'orders' => 'Orders',
            'pages' => 'Pages',
            'permissions' => 'Permissions',
            'products' => 'Products',
            'roles' => 'Roles',
            'settings_tab' => 'Settings',
            'store' => 'Store',
            'translations' => 'Translations',
            'users' => 'Users',
            'users_tab' => 'Users & Permissions',
        ),
    'attribute_sets' =>
        array(
            'create' =>
                array(
                    'general' => 'General',
                    'info' => 'Attribute Sets Information',
                    'name' => 'Title',
                    'status' => 'Status',
                    'title' => 'Create Attribute Sets',
                ),
            'datatable' =>
                array(
                    'created_at' => 'Created At',
                    'date_range' => 'Date Range',
                    'description' => 'Description',
                    'name' => 'Title',
                    'options' => 'Options',
                    'status' => 'Status',
                    'title' => 'Title',
                ),
            'edit' =>
                array(
                    'title' => 'Edit Attribute Sets',
                ),
            'title' => 'Attribute Sets',
            'validation' =>
                array(
                    'title' =>
                        array(
                            'required' => 'Title field is required',
                        ),
                ),
        ),
    'attribute_values' =>
        array(
            'create' =>
                array(
                    'attributes' => 'Attributes',
                    'general' => 'General',
                    'info' => 'Attribute Values Information',
                    'name' => 'Value',
                    'status' => 'Status',
                    'title' => 'Create Attribute Values',
                ),
            'datatable' =>
                array(
                    'created_at' => 'Created At',
                    'date_range' => 'Date Range',
                    'description' => 'Description',
                    'name' => 'Value',
                    'options' => 'Options',
                    'status' => 'Status',
                    'title' => 'Value',
                ),
            'edit' =>
                array(
                    'title' => 'Edit Attribute Values',
                ),
            'title' => 'Attribute Values',
            'validation' =>
                array(
                    'title' =>
                        array(
                            'required' => 'Value field is required',
                        ),
                ),
        ),
    'attribute_valuess' =>
        array(
            'validation' =>
                array(
                    'attribute_id' =>
                        array(
                            'required' => 'Please select attribute for this value',
                        ),
                ),
        ),
    'attributes' =>
        array(
            'create' =>
                array(
                    'attribute_sets' => 'Attribute Sets',
                    'categories' => 'Categories',
                    'general' => 'General',
                    'info' => 'Attribute Information',
                    'is_filterable' => 'Filterable',
                    'name' => 'Title',
                    'order' => 'Sorting Values',
                    'other' => 'Others',
                    'sort-btn' => 'Sorting',
                    'status' => 'Status',
                    'title' => 'Create Attributes',
                ),
            'datatable' =>
                array(
                    'attribute_set' => 'Attribute Sets',
                    'created_at' => 'Created At',
                    'date_range' => 'Date Range',
                    'description' => 'Description',
                    'name' => 'Attribute Title',
                    'options' => 'Options',
                    'status' => 'Status',
                    'title' => 'Title',
                ),
            'edit' =>
                array(
                    'title' => 'Edit Attribute',
                ),
            'title' => 'Attributes',
            'validation' =>
                array(
                    'attribute_set_id' =>
                        array(
                            'required' => 'Please select attribute sets for this attribute',
                        ),
                    'title' =>
                        array(
                            'required' => 'Title field is required',
                        ),
                ),
        ),
    'categories' =>
        array(
            'create' =>
                array(
                    'category_level' => 'Category Level',
                    'description' => 'Description',
                    'general' => 'General',
                    'image' => 'Image',
                    'info' => 'Category Information',
                    'main_tree' => 'Main Category',
                    'name' => 'Title',
                    'status' => 'Status',
                    'coming_soon' => 'coming soon',
                    'title' => 'Create Categories',
                ),
            'datatable' =>
                array(
                    'created_at' => 'Created At',
                    'date_range' => 'Date Range',
                    'description' => 'Description',
                    'image' => 'Image',
                    'name' => 'Category Title',
                    'options' => 'Options',
                    'status' => 'Status',
                    'title' => 'Title',
                ),
            'edit' =>
                array(
                    'title' => 'Edit Category',
                ),
            'title' => 'Categories',
            'validation' =>
                array(
                    'category_id' =>
                        array(
                            'required' => 'You must select category level for this category',
                        ),
                    'description' =>
                        array(
                            'required' => 'Description field is required',
                        ),
                    'image' =>
                        array(
                            'max' => 'You must chose only one image',
                        ),
                    'title' =>
                        array(
                            'required' => 'Title field is required',
                        ),
                ),
        ),
    'course_groups' =>
        array(
            'create' =>
                array(
                    'attachment_name' => 'Attachment Title',
                    'attachments' => 'Attachments',
                    'categories' => 'Categories',
                    'description' => 'Description',
                    'general' => 'General',
                    'info' => 'Course Attachments Information',
                    'is_free' => 'This Attachments is free ?',
                    'link' => 'Attachment Link',
                    'name' => 'Group Title',
                    'price' => 'Price for month',
                    'status' => 'Status',
                    'title' => 'Create Course Attachments',
                ),
            'datatable' =>
                array(
                    'created_at' => 'Created At',
                    'date_range' => 'Date Range',
                    'description' => 'Description',
                    'image' => 'Image',
                    'name' => 'Course Attachment Title',
                    'options' => 'Options',
                    'status' => 'Status',
                    'title' => 'Title',
                ),
            'edit' =>
                array(
                    'title' => 'Edit Course Attachment',
                ),
            'title' => 'Course Attachments',
            'validation' =>
                array(
                    'category_id' =>
                        array(
                            'required' => 'Please select at least one category',
                        ),
                    'description' =>
                        array(
                            'required' => 'Description field is required',
                        ),
                    'image' =>
                        array(
                            'max' => 'Please select one image only for this course',
                            'required' => 'Please upload course image',
                        ),
                    'title' =>
                        array(
                            'required' => 'Title field is required',
                        ),
                ),
        ),
    'courses' =>
        array(
            'create' =>
                array(
                    'attachments' => 'Attachments',
                    'categories' => 'Categories',
                    'demo_video' => 'Intro Video',
                    'description' => 'Description',
                    'general' => 'General',
                    'info' => 'Course Information',
                    'is_free' => 'This Attachments is free ?',
                    'link' => 'Attachments Link',
                    'name' => 'Title',
                    'price' => 'Price for month',
                    'status' => 'Status',
                    'title' => 'Create Courses',
                    'close' => 'Close',
                    'choose' => 'Choose',
                    'choose_video' => 'Choose Video',
                    'show_video' => 'Show Video',
                ),
            'datatable' =>
                array(
                    'created_at' => 'Created At',
                    'date_range' => 'Date Range',
                    'description' => 'Description',
                    'image' => 'Image',
                    'name' => 'Course Title',
                    'options' => 'Options',
                    'status' => 'Status',
                    'title' => 'Title',
                ),
            'edit' =>
                array(
                    'title' => 'Edit Course',
                ),
            'title' => 'Courses',
            'validation' =>
                array(
                    'category_id' =>
                        array(
                            'required' => 'Please select at least one category',
                        ),
                    'description' =>
                        array(
                            'required' => 'Description field is required',
                        ),
                    'image' =>
                        array(
                            'max' => 'Please select one image only for this course',
                            'required' => 'Please upload course image',
                        ),
                    'title' =>
                        array(
                            'required' => 'Title field is required',
                        ),
                ),
        ),
    'datatable' =>
        array(
            'colvis' => 'Columns',
            'excel' => 'Excel',
            'pageLength' => 'Page Length',
            'pdf' => 'PDF',
            'print' => 'Print',
        ),
    'footer' =>
        array(
            'copy_rights' => 'Copy Rights',
        ),
    'general' =>
        array(
            'add_btn' => 'Add',
            'add_new' => 'Add New',
            'back_btn' => 'Back',
            'create_success_alert' => 'Added Successfully',
            'date_range' =>
                array(
                    '30days' => 'Last 30 Days',
                    '7days' => 'Last 7 Days',
                    'cancel' => 'Cancel',
                    'custom' => 'Custom Range',
                    'last_month' => 'Last Month',
                    'month' => 'This Month',
                    'save' => 'Save',
                    'today' => 'Today',
                    'yesterday' => 'Yesterday',
                ),
            'delete_success_alert' => 'Deleted Successfully',
            'edit_btn' => 'Edit',
            'msg_all_delete' => 'Do you need to delete selected recored ?',
            'msg_delete' => 'Do you need to delete the recored ?',
            'no_delete' => 'No',
            'ops_alert' => 'ops!! , something wrong',
            'update_success_alert' => 'Updated Successfully',
            'yes_delete' => 'Yes',
        ),
    'home' =>
        array(
            'home' => 'Home',
            'title' => 'Dashboard',
            'welcome' => 'Welcome',
        ),
    'nav' =>
        array(
            'logout' => 'Logout',
            'profile' => 'Profile',
        ),
    'news' =>
        array(
            'create' =>
                array(
                    'description' => 'Description',
                    'general' => 'General',
                    'info' => 'News Information',
                    'name' => 'Title',
                    'status' => 'Status',
                    'title' => 'Create Pages',
                ),
            'datatable' =>
                array(
                    'created_at' => 'Created At',
                    'date_range' => 'Date Range',
                    'description' => 'Description',
                    'image' => 'Image',
                    'name' => 'News Title',
                    'options' => 'Options',
                    'status' => 'Status',
                    'title' => 'Title',
                ),
            'edit' =>
                array(
                    'title' => 'Edit News',
                ),
            'title' => 'News',
            'validation' =>
                array(
                    'description' =>
                        array(
                            'required' => 'Description field is required',
                        ),
                    'image' =>
                        array(
                            'max' => 'Please select one image only for this news',
                            'required' => 'Please upload news image',
                        ),
                    'title' =>
                        array(
                            'required' => 'Title field is required',
                        ),
                ),
        ),
    'option_values' =>
        array(
            'create' =>
                array(
                    'general' => 'General',
                    'info' => 'Option Values Information',
                    'name' => 'Value',
                    'options' => 'Options',
                    'status' => 'Status',
                    'title' => 'Create Option Values',
                ),
            'datatable' =>
                array(
                    'created_at' => 'Created At',
                    'date_range' => 'Date Range',
                    'description' => 'Description',
                    'name' => 'Value',
                    'options' => 'Options',
                    'status' => 'Status',
                    'title' => 'Value',
                ),
            'edit' =>
                array(
                    'title' => 'Edit Option Values',
                ),
            'title' => 'Option Values',
            'validation' =>
                array(
                    'title' =>
                        array(
                            'required' => 'Value field is required',
                        ),
                ),
        ),
    'options' =>
        array(
            'create' =>
                array(
                    'categories' => 'Categories',
                    'general' => 'General',
                    'info' => 'Option Information',
                    'is_filterable' => 'Filterable',
                    'name' => 'Title',
                    'option_sets' => 'Option Sets',
                    'order' => 'Sorting Values',
                    'other' => 'Others',
                    'sort-btn' => 'Sorting',
                    'status' => 'Status',
                    'title' => 'Create Options',
                ),
            'datatable' =>
                array(
                    'created_at' => 'Created At',
                    'date_range' => 'Date Range',
                    'description' => 'Description',
                    'name' => 'Attribute Title',
                    'option_set' => 'Option Sets',
                    'options' => 'Options',
                    'status' => 'Status',
                    'title' => 'Title',
                ),
            'edit' =>
                array(
                    'title' => 'Edit Option',
                ),
            'title' => 'Options',
            'validation' =>
                array(
                    'option_set_id' =>
                        array(
                            'required' => 'Please select attribute sets for this attribute',
                        ),
                    'title' =>
                        array(
                            'required' => 'Title field is required',
                        ),
                ),
        ),
    'orders' =>
        array(
            'create' =>
                array(
                    'description' => 'Description',
                    'general' => 'General',
                    'info' => 'Order Information',
                    'name' => 'Title',
                    'status' => 'Status',
                    'title' => 'Create Orders',
                ),
            'datatable' =>
                array(
                    'created_at' => 'Created At',
                    'date_range' => 'Date Range',
                    'description' => 'Description',
                    'name' => 'Order Title',
                    'options' => 'Options',
                    'status' => 'Status',
                    'title' => 'Title',
                ),
            'edit' =>
                array(
                    'title' => 'Edit Order',
                ),
            'title' => 'Orders',
            'validation' =>
                array(
                    'description' =>
                        array(
                            'required' => 'Description field is required',
                        ),
                ),
        ),
    'pages' =>
        array(
            'create' =>
                array(
                    'description' => 'Description',
                    'general' => 'General',
                    'info' => 'Page Information',
                    'name' => 'Title',
                    'status' => 'Status',
                    'title' => 'Create Pages',
                ),
            'datatable' =>
                array(
                    'created_at' => 'Created At',
                    'date_range' => 'Date Range',
                    'description' => 'Description',
                    'name' => 'Page Title',
                    'options' => 'Options',
                    'status' => 'Status',
                    'title' => 'Title',
                ),
            'edit' =>
                array(
                    'title' => 'Edit Page',
                ),
            'title' => 'Pages',
            'validation' =>
                array(
                    'description' =>
                        array(
                            'required' => 'Description field is required',
                        ),
                ),
        ),
    'permissions' =>
        array(
            'create' =>
                array(
                    'description' => 'Description',
                    'general' => 'General',
                    'info' => 'Permission Information',
                    'key' => 'Key',
                    'name' => 'Name',
                    'title' => 'Create Permission',
                ),
            'datatable' =>
                array(
                    'created_at' => 'Created At',
                    'date_range' => 'Date Range',
                    'description' => 'Description',
                    'name' => 'Key Name',
                    'options' => 'Options',
                    'title' => 'Title',
                ),
            'edit' =>
                array(
                    'title' => 'Edit Permission',
                ),
            'title' => 'Permissions',
            'validation' =>
                array(
                    'description' =>
                        array(
                            'required' => 'Description field is required',
                        ),
                    'display_name' =>
                        array(
                            'required' => 'Please fill the key input',
                            'unique' => 'This key taken before',
                        ),
                    'name' =>
                        array(
                            'required' => 'Please fill the name input',
                            'unique' => 'This name taken before',
                        ),
                ),
        ),
    'products' =>
        array(
            'create' =>
                array(
                    'attribute_values' => 'Values',
                    'attributes' => 'Attributes',
                    'categories' => 'Categories',
                    'description' => 'Description',
                    'gallery_images' => 'Gallery Images',
                    'general' => 'General',
                    'images' => 'Images',
                    'info' => 'Product Information',
                    'inventory_price' => 'inventory & price',
                    'main_images' => 'Main Images',
                    'name' => 'Title',
                    'new_product' => 'New Product',
                    'new_product_from' => 'New Product From',
                    'new_product_to' => 'New Product To',
                    'options' => 'Options',
                    'price' => 'Product Price',
                    'qty' => 'Qty',
                    'sku' => 'SKU',
                    'special_price' => 'Special Price',
                    'special_price_from' => 'Special Price From',
                    'special_price_to' => 'Special Price To',
                    'status' => 'Status',
                    'title' => 'Create Pages',
                ),
            'datatable' =>
                array(
                    'created_at' => 'Created At',
                    'date_range' => 'Date Range',
                    'description' => 'Description',
                    'image' => 'Image',
                    'name' => 'Product Title',
                    'options' => 'Options',
                    'price' => 'Price',
                    'sku' => 'SKU',
                    'status' => 'Status',
                    'title' => 'Title',
                ),
            'edit' =>
                array(
                    'title' => 'Edit Product',
                ),
            'title' => 'Products',
            'validation' =>
                array(
                    'category_id' =>
                        array(
                            'required' => 'Please select at least one category',
                        ),
                    'description' =>
                        array(
                            'required' => 'Description field is required',
                        ),
                    'image' =>
                        array(
                            'max' => 'Please select one image only for this cover product',
                            'required' => 'Please upload the cover image of product',
                        ),
                    'price' =>
                        array(
                            'required' => 'price field is required',
                        ),
                    'qty' =>
                        array(
                            'required' => 'Please fill the quantity of the product',
                        ),
                    'sku' =>
                        array(
                            'required' => 'SKU field is required',
                        ),
                    'title' =>
                        array(
                            'required' => 'Title field is required',
                        ),
                ),
        ),
    'roles' =>
        array(
            'create' =>
                array(
                    'description' => 'Description',
                    'general' => 'General data',
                    'info' => 'Role Information',
                    'key' => 'Key',
                    'name' => 'Name',
                    'permissions' => 'Permissions',
                    'title' => 'Create Role',
                ),
            'datatable' =>
                array(
                    'created_at' => 'Created At',
                    'date_range' => 'Date Range',
                    'description' => 'Description',
                    'name' => 'Key Name',
                    'options' => 'Options',
                    'permissions' => 'Permissions',
                    'title' => 'Title',
                ),
            'edit' =>
                array(
                    'title' => 'Edit Role',
                ),
            'title' => 'Roles',
            'validation' =>
                array(
                    'description' =>
                        array(
                            'required' => 'Description field is required',
                        ),
                    'display_name' =>
                        array(
                            'required' => 'Please fill the key input',
                            'unique' => 'This key taken before',
                        ),
                    'name' =>
                        array(
                            'required' => 'Please fill the name input',
                            'unique' => 'This name taken before',
                        ),
                ),
        ),
    'settings' =>
        array(
            'Language_label' => 'Languages',
            'countries_label' => 'Countries',
            'currencies_label' => 'Currencies',
            'default_country' => 'Default Country',
            'default_currency' => 'Default Currency',
            'default_language' => 'Default Language',
            'default_shipping' => 'Default Country Shipping',
            'general' => 'General',
            'general_data' => 'General Data',
            'info' => 'Setting Information',
            'logo' => 'Logo',
            'mail' => 'E-mail Config.',
            'mail_driver' => 'Mail Driver',
            'mail_encryption' => 'Mail Encryption',
            'mail_host' => 'Mail Host',
            'mail_password' => 'Password',
            'mail_port' => 'Mail Port',
            'mail_username' => 'Username',
            'other' => 'Other',
            'privacy_policy' => 'Privacy Policy',
            'save_buttons' => 'Save Changes',
            'shipping' => 'Shipping Config.',
            'shipping_label' => 'Shipping',
            'social_media' => 'Social Media',
            'supported_countries' => 'Supported Countries',
            'supported_currencies' => 'Supported Currencies',
            'supported_language' => 'Supported Language',
            'title' => 'Settings',
            'title_label' => 'Title',
        ),
    'users' =>
        array(
            'create' =>
                array(
                    'avatar' => 'Avatar',
                    'confirm_password' => 'Confirm Password',
                    'email' => 'E-mail',
                    'general' => 'General',
                    'image' => 'Image',
                    'info' => 'User Information',
                    'mobile' => 'Mobile',
                    'name' => 'Username',
                    'password' => 'Password',
                    'roles' => 'Roles',
                    'title' => 'Create User',
                ),
            'datatable' =>
                array(
                    'created_at' => 'Created At',
                    'date_range' => 'Date Range',
                    'email' => 'E-mail',
                    'image' => 'Image',
                    'mobile' => 'Mobile',
                    'name' => 'username',
                    'options' => 'Options',
                ),
            'edit' =>
                array(
                    'title' => 'Edit User',
                ),
            'title' => 'Users',
            'validation' =>
                array(
                    'email' =>
                        array(
                            'required' => 'E-mail is required',
                            'unique' => 'This email is taken before',
                        ),
                    'image' =>
                        array(
                            'max' => 'You must chose only one image',
                        ),
                    'mobile' =>
                        array(
                            'numeric' => 'Please put english numbers only in mobile field',
                            'required' => 'Mobile is required',
                        ),
                    'name' =>
                        array(
                            'required' => 'Please fill the name input',
                        ),
                    'password' =>
                        array(
                            'confirmed' => 'Password not matching the confirmation',
                            'min' => 'Password must be more than 6 characters',
                            'required' => 'Password is required',
                        ),
                ),
        ),

    'sliders' => array(
        'validation' => [
            'type' => [
                'required' => 'type is required',
                'in' => 'type must be in link or company',
            ],
            'category' => [
                'required' => 'category is required',
            ],
            'course' => [
                'required' => 'course is required',
            ],
            'link' => [
                'required' => 'link is required',
            ],
        ],
        'create' => [
            'form' => [
                'categories' => 'Categories',
            ],
        ],
        'datatable' => [
            'created_at' => 'Created At',
            'date_range' => 'Search By Dates',
            'image' => 'Image',
            'options' => 'Options',
            'status' => 'Status',
            'title' => 'Title',
        ],
        'form' => [
            'description' => 'Description',
            'image' => 'Image',
            'link_type' => 'Link Type',
            'external_link' => 'External link',
            'company' => 'Company',
            'status' => 'Status',
            'link' => 'Link',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'order' => 'Order',
            'companies' => 'Companies',
            'instagram' => 'Instagram',
            'is_employees_type' => 'Employees Type',
            'is_health_care' => 'Health Care Type',
            'is_house_keeping_type' => 'House Keeping Type',
            'lang' => 'longitude',
            'lat' => 'lattitude',
            'main_category' => 'Main Categories',
            'main_slider' => 'Main Slider',
            'meta_description' => 'Meta Description',
            'meta_keywords' => 'Meta Keywords',
            'phone' => 'Phone Number',
            'course' => 'course',
            'tabs' => [
                'category_level' => 'Category Level',
                'slider_level' => 'Sliders Tree',
                'general' => 'General Info.',
                'seo' => 'SEO',
            ],
            'title' => 'Title',
            'user' => 'User',
            'website' => 'Website Link',
        ],
        'routes' => [
            'create' => 'Create Sliders',
            'index' => 'Sliders',
            'update' => 'Update Slider',
        ],
    ),
);
