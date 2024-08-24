<?php 
 
namespace App\Http\Controllers; 
 
use Illuminate\Http\Request; 
use Illuminate\View\View; 
use Illuminate\Http\RedirectResponse;
use App\Models\Product; 
 
class ProductController extends Controller 
{

    public function index(): View 
    { 
        $viewData = []; 
        $viewData["title"] = "Products - Online Store"; 
        $viewData["subtitle"] =  "List of products"; 
        $viewData["products"] = Product::all();
        return view('product.index')->with("viewData", $viewData); 
    } 
 
    public function show(string $id) : View | RedirectResponse
    { 
        $viewData = []; 

        try {
            $product = Product::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->route('home.index');
        }

        $viewData["title"] = $product["name"]." - Online Store"; 
        $viewData["subtitle"] = $product["name"]." - Product information"; 
        $viewData["product"] = $product; 
        return view('product.show')->with("viewData", $viewData); 
    } 

    public function create(): View 
    { 
        $viewData = []; //to be sent to the view 
        $viewData["title"] = "Create product"; 
 
        return view('product.create')->with("viewData",$viewData); 
    } 
 
    public function save(Request $request) 
    { 
        $request->validate([ 
            "name" => "required", 
            "price" => "required|numeric|min:0" 
        ]); 
        //dd($request->all()); //dump the request data
        //here will be the code to call the model and save it to the database 

        //if the code runs this, then the form was valid and the product was saved
        //should add database validation before this, but...

        return redirect()->route('product.success');
    }

    public function success(): View 
    { 
        $viewData = []; 
        $viewData["title"] = "Products - Online Store"; 
        $viewData["subtitle"] =  "Successfully created product"; 
        return view('product.success')->with("viewData", $viewData); 
    } 
} 