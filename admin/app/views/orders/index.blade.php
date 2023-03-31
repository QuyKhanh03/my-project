@extends('templates.layout')
@section('content')
<div class="row">
    <!-- Styled Table Card-->
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card table-card">
            <div class="card-header pb-0">
                <h4>Orders List</h4>
            </div>
            <div class="card-body">
                <div class="chart-holder">
                    <div class="table-responsive">
                        <table class="table table-styled mb-0">
                            <thead>
                                <tr>
                                    <th>
                                        <div class="checkbox">
                                            <input id="checkbox1" type="checkbox">
                                            <label for="checkbox1"></label>
                                        </div>
                                    </th>
                                    <th>Order ID</th>
                                    <th>Billing Name</th>
                                    <th>Date</th>
                                    <th>Total</th>
                                    <th>Payment Status</th>
                                    <th>Payment Method</th>
                                    <th>View Details</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="checkbox">
                                            <input id="checkbox2" type="checkbox">
                                            <label for="checkbox2"></label>
                                        </div>
                                    </td>
                                    <td>#JH2033</td>
                                    <td>
                                        <span class="img-thumb ">
                                            <img src="assets/images/table/1.jpg" alt=" ">
                                            <span class="ml-2 ">Emily Arnold</span>
                                        </span>
                                    </td>
                                    <td>22/06/2022</td>
                                    <td>$600</td>
                                    <td>
                                        <label class="mb-0 badge badge-primary" title="" data-original-title="Pending">Pending</label>
                                    </td>
                                    <td>
                                        <span class="img-thumb">
                                            <i class="fab fa-cc-paypal"></i>
                                            <span class="ml-2">Paypal</span>
                                        </span>
                                    </td>
                                    <td>
                                        <label class="mb-0 badge badge-primary" title="" data-original-title="Pending">View Detail</label>
                                    </td>
                                    <td class="relative">
                                        <a class="action-btn " href="javascript:void(0); ">
                                            <svg class="default-size " viewBox="0 0 341.333 341.333 ">
                                                <g>
                                                    <g>
                                                        <g>
                                                            <path d="M170.667,85.333c23.573,0,42.667-19.093,42.667-42.667C213.333,19.093,194.24,0,170.667,0S128,19.093,128,42.667 C128,66.24,147.093,85.333,170.667,85.333z "></path>
                                                            <path d="M170.667,128C147.093,128,128,147.093,128,170.667s19.093,42.667,42.667,42.667s42.667-19.093,42.667-42.667 S194.24,128,170.667,128z "></path>
                                                            <path d="M170.667,256C147.093,256,128,275.093,128,298.667c0,23.573,19.093,42.667,42.667,42.667s42.667-19.093,42.667-42.667 C213.333,275.093,194.24,256,170.667,256z "></path>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg>
                                        </a>
                                        <div class="action-option ">
                                            <ul>
                                                <li>
                                                    <a href="javascript:void(0); "><i class="far fa-edit mr-2 "></i>Edit</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0); "><i class="far fa-trash-alt mr-2 "></i>Delete</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                               
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="text-right pt-2">
                    <nav class="d-inline-block">
                    <ul class="pagination mb-0 ">
                      <li class="page-item disabled">
                        <a class="page-link" href="javascript:void(0);" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                      </li>
                      <li class="page-item active "><a class="page-link " href="javascript:void(0); ">1</a></li>
                      <li class="page-item ">
                        <a class="page-link " href="javascript:void(0); ">2</a>
                      </li>
                      <li class="page-item "><a class="page-link " href="javascript:void(0); ">3</a></li>
                      <li class="page-item ">
                        <a class="page-link " href="javascript:void(0); "><i class="fas fa-chevron-right "></i></a>
                      </li>
                    </ul>
                  </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection