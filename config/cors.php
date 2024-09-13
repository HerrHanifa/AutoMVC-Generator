<?php

return [

    'paths' => ['api/*', 'sanctum/csrf-cookie'],  // السماح بالوصول إلى مسارات API وجلب ملف تعريف الارتباط CSRF إذا كنت تستخدمه.

    'allowed_methods' => ['*'],  // السماح بجميع طرق HTTP (GET, POST, PUT, DELETE, إلخ)

    'allowed_origins' => ['*'],  // السماح بجميع الأصول (المواقع)

    'allowed_origins_patterns' => [],  // لا توجد أنماط إضافية

    'allowed_headers' => ['*'],  // السماح بجميع الرؤوس (headers)

    'exposed_headers' => [],  // عدم تحديد رؤوس مكشوفة

    'max_age' => 0,  // لا يوجد تحديد لمدة حياة (TTL) للطلبات المسبقة

    'supports_credentials' => false,  // لا يتم دعم الكوكيز عبر CORS (اضبط إلى true إذا كنت تحتاج إلى ذلك)

];
