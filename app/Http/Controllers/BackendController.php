<?php

namespace App\Http\Controllers;

use App\DataTables\CarInventoryDataTable;
use Illuminate\Http\Request;
use App\CarManufacturer;
use App\CarModel;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;

class BackendController extends Controller
{
    /* Add Car Manufacturer */
    public function getAddManufacturer() {
        return view('backend.add-manufacturer');
    }

    public function postAddManufacturer(Request $request) {
        $this->validate($request,[
            'name' =>'required',
        ]);

        $manufacturer = new CarManufacturer;
        $manufacturer->name = $request['name'];

        if ($manufacturer->save()) {
            Flash::success('Car Manufacturer Added Successfully');
        } else {
            Flash::error('Error Adding Car Manufacturer');
        }
        return redirect()->back();
    }
    /* /Add Car Manufacturer */

    /* Add Car Model */
    public function getAddModel() {
    	$manufacturer = CarManufacturer::select('id', 'name')->get();
        return view('backend.add-model')->with('manufacturer', $manufacturer);
    }

    public function postAddModel(Request $request) {
        $this->validate($request,[
            'name' =>'required',
            'color' =>'required',
            'manufacturing_year' =>'required',
            'registration_number' =>'required',
            'model_img'=>'mimes:jpeg,png|max:512',
        ]);

        $model = new CarModel;
        $model->name = $request['name'];
        $model->color = $request['color'];
        $model->manufacturing_year = $request['manufacturing_year'];
        $model->registration_number = $request['registration_number'];
        $model->note = $request['note'];
        $model->manufacturer_id = $request['manufacturer_id'];
        $image = $this->UploadImage($request->model_img);
        $model->image = $image;
        if ($model->save()) {
            Flash::success('Car Model Added Successfully');
        } else {
            Flash::error('Error Adding Car Model');
        }
        return redirect()->back();
    }
    /* /Add Car Model */

    /* View Inventory */
    public function getViewInventory(CarInventoryDataTable $dataTable) {
        return $dataTable->render('backend.view-inventory');
    }
    /* /View Inventory */

    /* Upload Image */
    public function UploadImage($image) {
        $getimageName = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('images'), $getimageName);
        return $getimageName;
    }
    /* /Upload Image */

    /* Sold Car Model */
    public function SoldCarModel($id) {
        CarModel::where('id', $id)
            ->update(['status' => 'sold']);
        return 0;
    }
    /* /Sold Car Model */
}
