<?php

namespace App\Http\Controllers;

use App\Models\product;

class KhamphaController extends Controller
{
    // xe 718
    public function kp718_1()
    {
        $product = product::where('slug', '718-boxster')->firstOrFail();
        return view('User.Xe718.KP718_1', compact('product'));
    }

    public function kp718_2()
    {
        $product = product::where('slug', '718-boxster-s')->firstOrFail();
        return view('User.Xe718.KP718_2', compact('product'));
    }
    
    public function kp718_3()
    {
        $product = product::where('slug', '718-cayman')->firstOrFail();
        return view('User.Xe718.KP718_3', compact('product'));
    }
    
    public function kp718_4()
    {
        $product = product::where('slug', '718-cayman-s')->firstOrFail();
        return view('User.Xe718.KP718_4', compact('product'));
    }
    public function kp718_5()
    {
        $product = product::where('slug', '718-cayman-style-edition')->firstOrFail();
        return view('User.Xe718.KP718_5', compact('product'));
    }
    public function kp718_6()
    {
        $product = product::where('slug', '718-boxster-style-edition')->firstOrFail();
        return view('User.Xe718.KP718_6', compact('product'));
    }
    // Xe 911
    public function kp911_1()
    {
        $product = product::where('slug', '911-carrera')->firstOrFail();
        return view('User.Xe911.KP911_1', compact('product'));
    }
     public function kp911_2()
    {
        $product = product::where('slug', '911-carrera-t')->firstOrFail();
        return view('User.Xe911.KP911_2', compact('product'));
    }
     public function kp911_3()
    {
        $product = product::where('slug', '911-carrera-s')->firstOrFail();
        return view('User.Xe911.KP911_3', compact('product'));
    }
     public function kp911_4()
    {
        $product = product::where('slug', '911-carrera-gts')->firstOrFail();
        return view('User.Xe911.KP911_4', compact('product'));
    }
     public function kp911_5()
    {
        $product = product::where('slug', '911-carrera-4-gts')->firstOrFail();
        return view('User.Xe911.KP911_5', compact('product'));
    }
     public function kp911_6()
    {
        $product = product::where('slug', '911-carrera-s-cabriolet')->firstOrFail();
        return view('User.Xe911.KP911_6', compact('product'));
    }
     public function kp911_7()
    {
        $product = product::where('slug', '911-carrera-cabriolet')->firstOrFail();
        return view('User.Xe911.KP911_7', compact('product'));
    }
     public function kp911_8()
    {
        $product = product::where('slug', '911-carrera-t-cabriolet')->firstOrFail();
        return view('User.Xe911.KP911_8', compact('product'));
    }
     public function kp911_9()
    {
        $product = product::where('slug', '911-carrera-gts-cabriolet')->firstOrFail();
        return view('User.Xe911.KP911_9', compact('product'));
    }
     public function kp911_10()
    {
        $product = product::where('slug', '911-carrera-4-gts-cabriolet')->firstOrFail();
        return view('User.Xe911.KP911_10', compact('product'));
    }
    // Xe Taycan
        public function kptaycan_1()
    {
        $product = product::where('slug', 'taycan')->firstOrFail();
        return view('User.Xetaycan.KPtaycan_1', compact('product'));
    }
     public function kptaycan_2()
    {
        $product = product::where('slug', 'taycan-4')->firstOrFail();
        return view('User.Xetaycan.KPtaycan_2', compact('product'));
    }
        public function kptaycan_3()
    {
        $product = product::where('slug', 'taycan-4s')->firstOrFail();
        return view('User.Xetaycan.KPtaycan_3', compact('product'));
    }
        public function kptaycan_4()
    {
        $product = product::where('slug', 'taycan-gts')->firstOrFail();
        return view('User.Xetaycan.KPtaycan_4', compact('product'));
    }
        public function kptaycan_5()
    {
        $product = product::where('slug', 'taycan-turbo')->firstOrFail();
        return view('User.Xetaycan.KPtaycan_5', compact('product'));
    }
        public function kptaycan_6()
    {
        $product = product::where('slug', 'taycan-turbo-s')->firstOrFail();
        return view('User.Xetaycan.KPtaycan_6', compact('product'));
    }
        public function kptaycan_7()
    {
        $product = product::where('slug', 'taycan-turbo-gt')->firstOrFail();
        return view('User.Xetaycan.KPtaycan_7', compact('product'));
    }
        public function kptaycan_8()
    {
        $product = product::where('slug', 'taycan-4-cross-turismo')->firstOrFail();
        return view('User.Xetaycan.KPtaycan_8', compact('product'));
    }
        public function kptaycan_9()
    {
        $product = product::where('slug', 'taycan-4s-cross-turismo')->firstOrFail();
        return view('User.Xetaycan.KPtaycan_9', compact('product'));
    }
        public function kptaycan_10()
    {
        $product = product::where('slug', 'taycan-turbo-cross-turismo')->firstOrFail();
        return view('User.Xetaycan.KPtaycan_10', compact('product'));
    }
    // Xe Panamera
        public function kppana_1()
    {
        $product = product::where('slug', 'panamera-mi')->firstOrFail();
        return view('User.Xepanamera.KPpana_1', compact('product'));
    }
        public function kppana_2()
    {
        $product = product::where('slug', 'panamera')->firstOrFail();
        return view('User.Xepanamera.KPpana_2', compact('product'));
    }
    // Xe Macan
        public function kpmacan_1()
    {
        $product = product::where('slug', 'macan')->firstOrFail();
        return view('User.Xemacan.KPmacan_1', compact('product'));
    }
        public function kpmacan_2()
    {
        $product = product::where('slug', 'macan-t')->firstOrFail();
        return view('User.Xemacan.KPmacan_2', compact('product'));
    }
        public function kpmacan_3()
    {
        $product = product::where('slug', 'macan-s')->firstOrFail();
        return view('User.Xemacan.KPmacan_3', compact('product'));
    }
        public function kpmacan_4()
    {
        $product = product::where('slug', 'macan-gts')->firstOrFail();
        return view('User.Xemacan.KPmacan_4', compact('product'));
    }
        public function kpmacan_5()
    {
        $product = product::where('slug', 'macan-thun-in')->firstOrFail();
        return view('User.Xemacan.KPmacan_5', compact('product'));
    }
        public function kpmacan_6()
    {
        $product = product::where('slug', 'macan-4-thun-in')->firstOrFail();
        return view('User.Xemacan.KPmacan_6', compact('product'));
    }
        public function kpmacan_7()
    {
        $product = product::where('slug', 'macan-4s-thun-in')->firstOrFail();
        return view('User.Xemacan.KPmacan_7', compact('product'));
    }
        public function kpmacan_8()
    {
        $product = product::where('slug', 'macan-turbo-thun-in')->firstOrFail();
        return view('User.Xemacan.KPmacan_8', compact('product'));
    }
    // Xe Cayenne
        public function kpcayne_1()
    {
        $product = product::where('slug', 'cayenne')->firstOrFail();
        return view('User.Xecayenne.KPce_1', compact('product'));
    }
        public function kpcayne_2()
    {
        $product = product::where('slug', 'cayenne-s')->firstOrFail();
        return view('User.Xecayenne.KPce_2', compact('product'));
    }
        public function kpcayne_3()
    {
        $product = product::where('slug', 'cayenne-gts')->firstOrFail();
        return view('User.Xecayenne.KPce_3', compact('product'));
    }
        public function kpcayne_4()
    {
        $product = product::where('slug', 'cayenne-coup')->firstOrFail();
        return view('User.Xecayenne.KPce_4', compact('product'));
    }
        public function kpcayne_5()
    {
        $product = product::where('slug', 'cayenne-s-coup')->firstOrFail();
        return view('User.Xecayenne.KPce_5', compact('product'));
    }
         public function kpcayne_6()
    {
        $product = product::where('slug', 'cayenne-gts-coup')->firstOrFail();
        return view('User.Xecayenne.KPce_6', compact('product'));
    }
        public function kpcayne_7()
    {
        $product = product::where('slug', 'cayenne-turbo-gt')->firstOrFail();
        return view('User.Xecayenne.KPce_7', compact('product'));
    }
}
