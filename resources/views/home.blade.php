@extends('layouts.app')

@section('content')
@include('includes.status')
<div class="container-fluid mt-1 bg-light">
    <div class="header bg-light">
        <h1>Next-Generation Firewall</h1>
    </div>
    <div class="row">
        <div class="col-xl-4 p-3 text-black bg-light">
            <div class="header">
                <h1>Overview</h1>
                <p>FortiGate NGFWs delivers industry leading enterprise security for any edge at any scale with full visibility, and threat protection.
                    Organizations can weave security deep into the Hybrid IT architecture, and build Security-Driven Networks to:</p>
            </div>
        </div>
        <div class="col-xl-4 p-3 text-white bg-light">
            <table class="table table-hover">
                <tbody>
                <tr>
                    <td>1.</td>
                    <td>Deliver ultra-fast security end-to-end</td>
                </tr>
                </tbody>
                <tr>
                    <td>2.</td>
                    <td>Enable consistent real-time defense with AI/ML powered FortiGuard Services</td>
                </tr>
                <tr>
                    <td>3.</td>
                    <td>Achieve seamless user experience with Security Processing Units</td>
                </tr>
                <tr>
                    <td>4.</td>
                    <td>Improve operational efficiency and automate workflows</td>
                </tr>
            </table>
        </div>
        <div class="col-xl-4 p-3 bg-light text-white">
            <img src="/img/forti-NGFW.jpg" width="800" height="418" alt="forti-NGFW">
        </div>
    </div>
    <div class="container mt-3">
        <div id="accordion">
            <div class="card">
                <div class="card-header">
                    <a class="btn" data-bs-toggle="collapse" href="#collapseOne">
                        Modely a specifikacie
                    </a>
                </div>
                <div id="collapseOne" class="collapse show" data-bs-parent="#accordion">
                    <div class="card-body">
                        <div class="row okraje">
                            <div class="col-md-6 items">
                                <img src="/img/fortigate-1800f.jpg" alt="Fortigate-1800f"  width=auto height=auto>
                            </div>
                            <div class="col-md-6">
                                <h2>FortiGate 1800F</h2>
                                <p>The FortiGate 1800F enables high performance and dynamic Internal segmentation, and elephant flows that provide secure high-speed cloud on ramps.
                                    With high-performance IPsec encryption capabilities, enterprises can build massively scalable remote access solutions.</p>
                            </div>
                        </div>
                        <div class="row okraje">
                            <div class="col-md-6 items">
                                <img src="/img/Fortigate2600F.jpg" alt="Fortigate-2600f"  width=auto height=auto>
                            </div>
                            <div class="col-md-6">
                                <h2>FortiGate 2600F</h2>
                                <p>Introducing the FortiGate 2600F Series | Next Generation Firewall</p>
                            </div>
                        </div>
                        <div class="row okraje">
                            <div class="col-md-6">
                                <img src="/img/FortiGate4200F.jpg" alt="FortiGate 4200F" width=auto height=auto>
                            </div>
                            <div class="col-md-6">
                                <h2>FortiGate 4200F</h2>
                                <p>TThe FortiGate 4200F series disrupts the network firewall marketplace with unprecedented scale and performance for
                                    next-generation firewall (NGFW) that protects hybrid and hyperscale data centers for enterprises and service providers.
                                    With VXLAN termination and re-origination, it allows enterprises to build highly scalable hybrid IT architectures.</p>
                            </div>
                        </div>
                        <div class="row okraje">
                            <div class="col-md-6">
                                <img src="/img/FortiGate4400F.jpg" alt="FortiGate 4400F" width=auto height=auto>
                            </div>
                            <div class="col-md-6">
                                <h2>FortiGate 4400F</h2>
                                <p>
                                    The FortiGate 4400F series introduces the world’s first Hyperscale Firewall that seamlessly enables Security-Driven
                                    Networking, manages all security risks for enterprises, and protects 5G networks. With high-port density, it offers
                                    encrypted and high-speed data center interconnects.
                                </p>
                            </div>
                        </div>
                        <div class="row okraje">
                            <div class="col-md-6 ">
                                <img src="/img/FortiGate7121F.jpg" alt="FortiGate 7121F" width=auto height=auto>
                            </div>
                            <div class="col-md-6 align-content-center">
                                <h2>FortiGate 4400F</h2>
                                <p>
                                    The FortiGate 7121F series delivers industry’s highest performance for next generation
                                    firewall (NGFW) capabilities for large enterprises and service providers.
                                    With multiple high-speed interfaces, it is the first and the only NGFW that offers
                                    400G connectivity, and a very high-port density, to provide super fast and secure
                                    data center inter-connects and high-throughput, for ideal deployments including
                                    enterprise edge, hybrid data center core, and across internal segments.
                                </p>
                            </div>
                        </div>
                    </div>

                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <a class="collapsed btn" data-bs-toggle="collapse" href="#collapseTwo">
                        Services
                    </a>
                </div>
                <div id="collapseTwo" class="collapse" data-bs-parent="#accordion">
                    <div class="card-body">
                        Faster time to activation is key in supporting the pace of digital innovation.
                        FortiGuard market-leading, AI-enabled Security-as-a-Service capabilities are designed from the ground up to seamlessly work together to provide context-aware security policy and coordinated real-time attack prevention.
                        Flexible consumption options are available across networks, endpoints, and clouds.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
