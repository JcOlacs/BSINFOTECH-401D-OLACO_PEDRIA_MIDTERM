<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Index - Yummy Bootstrap Template</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Amatic+SC:wght@400;700&display=swap"     rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">
</head>

<body>
    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container position-relative d-flex align-items-center justify-content-between">

            <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="assets/img/logo.png" alt=""> -->
                <h1 class="sitename">Ice cream yummy</h1>
                <span>.</span>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="#hero" class="active">Data Form<br></a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

            <a class="btn-getstarted" href="{{ route('products.index') }}">Landing page</a>

        </div>
    </header>

    <div class="container">
        <div class="row">
            <div class="col-md-offset-1 col-md-10">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <a href="#" class="btn btn-sm btn-primary pull-left" data-toggle="modal"
                                    data-target="#exampleModalCenter">
                                    <i class="fa fa-plus-circle"></i> Add New
                                </a>
                                <form class="form-horizontal pull-right">
                                    <div class="form-group">
                                        <label>Show : </label>
                                        <select class="form-control">
                                            <option>5</option>
                                            <option>10</option>
                                            <option>15</option>
                                            <option>20</option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Action</th>
                                    <th>Name</th>
                                    <th>Dish Type</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Created</th>
                                    <th>Updated</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($products->count() > 0)
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>
                                                <ul class="action-list d-flex">
                                                    <li class="mr-2">
                                                        <a href="#" class="btn btn-primary" data-toggle="modal"
                                                            data-target="#updateDish{{ $product->id }}">
                                                            <i class="fa fa-pencil-square-o"></i>
                                                        </a>
                                                    </li>
                                                    <li class="mr-2">
                                                        <a href="#" class="btn btn-danger" data-toggle="modal"
                                                        data-target="#deleteDish{{ $product->id }}">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="btn btn-success view-product"
                                                            data-toggle="modal"
                                                            data-target="#viewProductModal"
                                                            data-name="{{ $product->name }}"
                                                            data-dish-type="{{ $product->dish_type }}"
                                                            data-description="{{ $product->description }}"
                                                            data-price="{{ $product->price }}"
                                                            data-image="{{ asset($product->image) }}"
                                                            data-created="{{ $product->created_at }}"
                                                            data-updated="{{ $product->updated_at }}">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->dish_type }}</td>
                                            <td>{{ $product->description }}</td>
                                            <td>{{ $product->price }}</td>
                                            <td>{{ $product->created_at }}</td>
                                            <td>{{ $product->updated_at }}</td>
                                        </tr>

                                        <!-- Update product -->
                                        <div class="modal fade" id="updateDish{{ $product->id }}" tabindex="-1" role="dialog"
                                            aria-labelledby="updateDishModalLabel{{ $product->id }}" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="updateDishModalLabel{{ $product->id }}">Update Product Information</h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('products.update', $product->id) }}" method="POST"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')

                                                            <div class="form-group">
                                                                <label for="dish-type-{{ $product->id }}">Dish Type</label>
                                                                <select name="dish_type" class="form-control" id="dish-type-{{ $product->id }}">
                                                                    <option value="breakfast" {{ $product->dish_type == 'breakfast' ? 'selected' : '' }}>Breakfast</option>
                                                                    <option value="lunch" {{ $product->dish_type == 'lunch' ? 'selected' : '' }}>Lunch</option>
                                                                    <option value="dinner" {{ $product->dish_type == 'dinner' ? 'selected' : '' }}>Dinner</option>
                                                                    <option value="dessert" {{ $product->dish_type == 'dessert' ? 'selected' : '' }}>Dessert</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="dish-name-{{ $product->id }}">Dish Name</label>
                                                                <input type="text" name="name" class="form-control"
                                                                    id="dish-name-{{ $product->id }}" value="{{ $product->name }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="dish-description-{{ $product->id }}">Description</label>
                                                                <textarea class="form-control" name="description" id="dish-description-{{ $product->id }}">{{ $product->description }}</textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="dish-price-{{ $product->id }}">Price</label>
                                                                <input type="number" name="price" class="form-control"
                                                                    id="dish-price-{{ $product->id }}" value="{{ $product->price }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="dish-image-{{ $product->id }}">Dish Image</label>
                                                                <input type="file" name="image" class="form-control-file"
                                                                    id="dish-image-{{ $product->id }}">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Update</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Delete Modal -->
                                        <div class="modal fade" id="deleteDish{{ $product->id }}" tabindex="-1" role="dialog"
                                            aria-labelledby="deleteDishModalLabel{{ $product->id }}" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteDishModalLabel{{ $product->id }}">Delete Confirmation</h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure you want to delete this product?<br>
                                                        product: <strong>{{ $product->name }}</strong>.
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                        <form action="{{ route('products.delete', $product->id) }}" method="POST" style="display: inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Update Modal -->
                                        <div class="modal fade" id="viewProductModal" tabindex="-1" role="dialog" aria-labelledby="viewProductModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="viewProductModalLabel">Product Details</h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="text-center">
                                                            <img id="productImage" class="img-fluid mb-3" alt="Product Image">
                                                        </div>
                                                        <p><strong>Name:</strong> <span id="productName"></span></p>
                                                        <p><strong>Dish Type:</strong> <span id="productDishType"></span></p>
                                                        <p><strong>Description:</strong> <span id="productDescription"></span></p>
                                                        <p><strong>Price:</strong> $<span id="productPrice"></span></p>
                                                        <p><strong>Created At:</strong> <span id="productCreatedAt"></span></p>
                                                        <p><strong>Updated At:</strong> <span id="productUpdatedAt"></span></p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="7" class="text-center">No dish in the database</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-sm-6 col-xs-6">
                                showing <b>{{ $products->count() }}</b> out of <b>{{ $products->total() }}</b> entries
                            </div>
                            <div class="col-sm-6 col-xs-6">
                                <ul class="pagination hidden-xs pull-right"> {{ $products->links() }} </ul>
                                <ul class="pagination visible-xs pull-right"> {{ $products->links() }} </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addDishModalLabel">Add New Dish</h5>
                </div>
                <div class="modal-body">
                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="dish-type">Dish Type</label>
                            <select name="dish_type" class="form-control" id="dish-type">
                                <option value="breakfast">Breakfast</option>
                                <option value="lunch">Lunch</option>
                                <option value="dinner">Dinner</option>
                                <option value="dessert">Dessert</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="dish-name">Dish Name</label>
                            <input type="text" name="name" class="form-control" id="dish-name"
                                placeholder="Enter dish name">
                        </div>
                        <div class="form-group">
                            <label for="dish-description">Description</label>
                            <input class="form-control" name="description" id="dish-description" rows="3"
                                placeholder="Enter description"></input>
                        </div>
                        <div class="form-group">
                            <label for="dish-price">Price</label>
                            <input type="number" name="price" class="form-control" id="dish-price"
                                placeholder="Enter price">
                        </div>
                        <div class="form-group">
                            <label for="dish-image">Dish Image</label>
                            <input type="file" name="image" class="form-control-file" id="dish-image">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- Dish added modal -->
    <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Success</h5>
                </div>
                <div class="modal-body">
                    {{ session('success') }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            @if (session('success'))
                $('#successModal').modal('show');
            @endif
        });
    </script>

    <script>
        $(document).on('click', '.view-product', function() {
            // Get product data from data attributes
            const name = $(this).data('name');
            const dishType = $(this).data('dish-type');
            const description = $(this).data('description');
            const price = $(this).data('price');
            const image = $(this).data('image');
            const createdAt = $(this).data('created');
            const updatedAt = $(this).data('updated');

            // Populate modal fields
            $('#productName').text(name);
            $('#productDishType').text(dishType);
            $('#productDescription').text(description);
            $('#productPrice').text(price);
            $('#productImage').attr('src', image);
            $('#productCreatedAt').text(createdAt);
            $('#productUpdatedAt').text(updatedAt);
        });
    </script>
</body>

</html>
