@extends('layouts.dashboard')
@section('page-tittle')
    All Subcategory
@endsection
@section('content')
   
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pages/</span> All Subcategory</h4>
        <!-- Bootstrap Table with Header - Light -->
        <div class="card">
            <h5 class="card-header">Available Sub Category Information</h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>Id</th>
                            <th>Sub Category Name</th>
                            <th>Category</th>
                            <th>Product</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">


                        <tr>
                            <td>1</td>
                            <td>Electronic</td>
                            <td>Mobile</td>
                            <td>100</td>
                            <td>
                                <a class="btn btn-primary" href="">Edit</a>
                                <a class="btn btn-danger" href="">Delet</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Bootstrap Table with Header - Light -->
    </div>
@endsection
