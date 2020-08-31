<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class AdminRatingController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $ratings = Rating::with('user:id,name','product:id,pro_name,pro_slug')->paginate(10);

        $viewData = [
            'ratings' => $ratings
        ];

        return view('admin::rating.index',$viewData);
    }
    public function delete($id)
    {
       Rating::find($id)->delete();
        return redirect()->back()->with('success', 'Xóa thành công');
    }
}
