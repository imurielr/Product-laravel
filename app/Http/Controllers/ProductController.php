<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Product;

    class ProductController extends Controller {

        public function create() {
            return view('product.create');
        }

        public function save(Request $request) {
            $request->validate([
                "type" => "required",
                "price" => "required | numeric | gt:0",
                "description" => "required"
            ]);
            Product::create($request->only(["type","price","description"]));

            return back()->with('success','Item created successfully!');
        }

        public function show() {
            $data = []; // Data to be sent to de view

            $data["title"] = "Products";
            $data["products"] = Product::all();

            return view('product.show')->with("data", $data);
        }

        public function showProduct($id) {
            $data = []; //to be sent to the view
            $product = Product::findOrFail($id);

            $data["title"] = $product->getType();
            $data["product"] = $product;

            return view('product.showProduct')->with("data",$data);
        }

        public function delete($id) {
            Product::find($id)->delete();
            
            return redirect()->route('product.show');
        }

    }