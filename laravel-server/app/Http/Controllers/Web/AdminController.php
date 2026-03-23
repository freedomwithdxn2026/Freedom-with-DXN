<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Order;
use App\Models\Product;
use App\Models\SiteSettings;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $stats = [
            'products' => Product::count(),
            'orders' => Order::count(),
            'users' => User::count(),
            'revenue' => Order::where('status', 'delivered')->sum('total_amount'),
        ];

        return view('admin.index', compact('stats'));
    }

    public function products()
    {
        $products = Product::orderByDesc('created_at')->paginate(20);
        return view('admin.products', compact('products'));
    }

    public function productStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category' => 'required|string',
        ]);

        Product::create($request->only([
            'name', 'description', 'price', 'category', 'image', 'landing_image',
            'in_stock', 'stock_count', 'sku', 'ingredients', 'usage',
            'featured', 'dxn_id', 'source_url', 'landing_page', 'dxn_category',
        ]));

        return back()->with('success', 'Product created successfully!');
    }

    public function productUpdate(Request $request, Product $product)
    {
        $product->update($request->only([
            'name', 'description', 'price', 'category', 'image', 'landing_image',
            'in_stock', 'stock_count', 'sku', 'ingredients', 'usage',
            'featured', 'dxn_id', 'source_url', 'landing_page', 'dxn_category',
        ]));

        return back()->with('success', 'Product updated successfully!');
    }

    public function productDestroy(Product $product)
    {
        $product->delete();
        return back()->with('success', 'Product deleted.');
    }

    public function orders()
    {
        $orders = Order::with('user', 'items.product')->orderByDesc('created_at')->paginate(20);
        return view('admin.orders', compact('orders'));
    }

    public function orderStatus(Request $request, Order $order)
    {
        $request->validate(['status' => 'required|in:pending,processing,shipped,delivered,cancelled']);
        $order->update(['status' => $request->status]);
        return back()->with('success', 'Order status updated.');
    }

    public function users()
    {
        $users = User::orderByDesc('created_at')->paginate(20);
        return view('admin.users', compact('users'));
    }

    public function blogs()
    {
        $blogs = Blog::orderByDesc('created_at')->paginate(20);
        return view('admin.blogs', compact('blogs'));
    }

    public function blogStore(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'category' => 'required|string',
        ]);

        $data = $request->only(['title', 'content', 'category', 'excerpt', 'image', 'tags', 'published']);
        $data['slug'] = \Illuminate\Support\Str::slug($request->title);
        $data['author_id'] = auth()->id();

        Blog::create($data);

        return back()->with('success', 'Blog post created!');
    }

    public function blogUpdate(Request $request, Blog $blog)
    {
        $blog->update($request->only(['title', 'content', 'category', 'excerpt', 'image', 'tags', 'published']));
        return back()->with('success', 'Blog post updated!');
    }

    public function blogDestroy(Blog $blog)
    {
        $blog->delete();
        return back()->with('success', 'Blog post deleted.');
    }

    public function settings()
    {
        $settings = SiteSettings::global();
        return view('admin.settings', compact('settings'));
    }

    public function settingsUpdate(Request $request)
    {
        $settings = SiteSettings::global();
        $settings->update($request->only([
            'colors', 'fonts', 'hero', 'contact', 'social', 'seo', 'footer', 'navbar', 'charts',
        ]));

        return back()->with('success', 'Settings updated!');
    }
}
