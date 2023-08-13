<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>{{ SettingHelper::get('app_name') }}</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    {{-- <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicons/favicon.ico">
    <link rel="manifest" href="{{ url("assets/img/favicons/manifest.json") }}">
    <meta name="msapplication-TileImage" content="assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff"> --}}


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="{{ url('assets/css/theme.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ url('/mazer/extensions/@fortawesome/fontawesome-free/css/all.min.css') }}" />
    <style>
        .logo-brand {
            width: 75px;
        }

        .brand-title {
            display: block;
        }

        /* hide .brand-title in tablet and mobile devices */
        @media (max-width: 991px) {
            .brand-title {
                display: none;
            }
        }

        .img-layanan {
            object-fit: cover;
            object-position: center;
        }

        .navbar-light,.bg-1000,.btn-primary {
            background-color: #2B3467 !important;
        }

        .nav-link,.brand-title {
            color:#F1F1F1;
        }

        .navbar-light .navbar-toggler {
            color: #F1F1F1 !important;
            border-color: rgba(0, 0, 0, 0.1);
        }

        .navbar-light .navbar-nav .nav-link {
            color:#F1F1F1;
        }

        .navbar-light .navbar-nav .show > .nav-link, .navbar-light .navbar-nav .nav-link.active {
            color: #ffffff;
        }

        #profil,#visi-misi,#kontak {
            background-color: #F2F4F7;
        }

        .layanan-card {
            background-color: #00B88C;
            border-radius: 30px;
            border: none;
            box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);

        }

        .layanan-card .card-title {
            color: #ffffff;
        }

        .layanan-card .card-text {
            color: #ffffff;
        }
    </style>


</head>


<body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" >
            <div class="container">
                <a class="navbar-brand d-flex align-items-center fw-bold fs-2" href="index.html">
                    <img src="{{ url(SettingHelper::get('app_logo')) }}" alt="" class="logo-brand">
                    <span class="brand-title">
                        {{ SettingHelper::get('app_name') }}
                    </span>
                </a>
                <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation"><i class="fas fa-bars"></i></button>
                <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto pt-2 pt-lg-0">
                        <li class="nav-item mx-1" data-anchor="data-anchor"><a class="nav-link fw-medium"
                                aria-current="page" href="#home">Home</a></li>
                        <li class="nav-item mx-1" data-anchor="data-anchor"><a class="nav-link fw-medium"
                                href="#profil">Profil</a></li>
                        <li class="nav-item mx-1" data-anchor="data-anchor"><a class="nav-link fw-medium"
                                href="#layanan">Layanan</a></li>

                        <li class="nav-item mx-1" data-anchor="data-anchor"><a class="nav-link fw-medium"
                                href="#visi-misi">Visi & Misi</a></li>

                        <li class="nav-item mx-1" data-anchor="data-anchor"><a class="nav-link fw-medium"
                                href="#struktur">Struktur Organisasi</a></li>

                        <li class="nav-item mx-1" data-anchor="data-anchor"><a class="nav-link fw-medium"
                                href="#kontak">Kontak</a></li>

                    </ul>
                    {{-- <form class="ps-lg-5">
              <button class="btn btn-lg btn-primary rounded-pill order-0" type="submit">Try for free</button>
            </form> --}}
                </div>
            </div>
        </nav>




        <section class="py-0" id="home">
            <div class="bg-holder"
                style="background-image:url(assets/img/illustrations/hero-bg.png);background-position:bottom;background-size:cover;">
            </div>
            <!--/.bg-holder-->

            <div class="container position-relative">
                <div class="row align-items-center py-8">
                    <div class="col-md-5 col-lg-6 order-md-1 text-center text-md-end"><img class="img-fluid"
                            src="{{ url('images/img-1.png') }}" width="350" alt="" /></div>
                    <div class="col-md-7 col-lg-6 text-center text-md-start"><span
                            class="badge bg-light rounded-pill text-dark align-items-center d-flex flex-row-reverse justify-content-end mx-auto mx-md-0 ps-0 w-75 w-sm-50 w-md-75 w-xl-50 mb-3"></span>
                        <h1 class="mb-4 display-3 fw-bold lh-sm">{{ SettingHelper::get('app_name') }}</h1>
                        <p class="mt-3 mb-4 fs-1">{{ SettingHelper::get('app_description') }}</p>
                        <a class="btn btn-lg btn-primary rounded-pill hover-top" href="#layanan" role="button">Lihat
                            Layanan</a>
                    </div>
                </div>
            </div>
        </section>




        <!-- ============================================-->
        <!-- <section> begin ============================-->
        <section class="py-5" id="profil">

            <div class="container">
                <div class="row align-items-center mb-6">
                    <div class="col-md-5 col-lg-4 offset-lg-1">
                        <h1 class="fw-bold lh-base">Siapa Kami?</h1>
                    </div>
                    <div class="col-md-6 col-lg-5 offset-lg-1 border-start py-5 ps-5">
                        <p class="mb-0">{{ SettingHelper::get('profile_description') }}</p>
                    </div>
                </div>
                {{-- <div class="row">
                        <div class="col-md-4 col-lg-3 offset-lg-1 mb-4">
                            <div class="py-4"><img class="img-fluid" src="assets/img/illustrations/automatic.png"
                                    width="90" alt="" /></div>
                            <h5 class="fw-bold text-danger">Fast performance</h5>
                            <p class="mt-2 mb-0">Get your blood tests delivered at home collect a sample from the news your
                                blood tests.</p>
                        </div>
                        <div class="col-md-4 col-lg-3 offset-lg-1 mb-4">
                            <div class="py-4"><img class="img-fluid" src="assets/img/illustrations/network.png"
                                    width="90" alt="" /></div>
                            <h5 class="fw-bold text-primary">Prototyping</h5>
                            <p class="mt-2 mb-0">Get your blood tests delivered at home collect a sample from the news your
                                blood tests.</p>
                        </div>
                        <div class="col-md-4 col-lg-3 offset-lg-1 mb-4">
                            <div class="py-4"><img class="img-fluid" src="assets/img/illustrations/rewards.png"
                                    width="90" alt="" /></div>
                            <h5 class="fw-bold text-success">Vector Editing</h5>
                            <p class="mt-2 mb-0">Get your blood tests delivered at home collect a sample from the news your
                                blood tests.</p>
                        </div>
                    </div> --}}
            </div>
            <!-- end of .container-->

        </section>
        <!-- <section> close ============================-->
        <!-- ============================================-->


        <!-- ============================================-->
        <!-- <section> begin ============================-->
        <section class="py-6 mb-4" id="layanan">

            <div class="container">
                <div class="container">
                    <div class="row align-items-center">
                        {{-- <div class="col-md-6 order-md-1 text-end text-md-end">
                            <img class="img-fluid rounded mb-4"
                                src="{{ url(SettingHelper::get('layanan_jasa_image')) }}" width="400"
                                alt="" />
                        </div> --}}
                        <div class="col-md-12 text-center">
                            <h6 class="fw-bold fs-4 display-3 lh-sm">Layanan & Jasa</h6>
                            <p class="my-4 pe-xl-5"> Kami berkomitmen memberikan pelayanan dan jasa berkualitas.</p>
                            <div class="row">
                                @foreach ($layanans as $layanan)
                                    {{-- <div class="col-md-4">
                                        <div class="mb-4">
                                            <div class="py-4"><img class="img-fluid"
                                                    src="{{ url($layanan->gambar_layanan) }}"
                                                    style="width: 90px; height: 90px;display: block;"
                                                    alt="" /></div>
                                            <h5 class="fw-bold text-undefined">{{ $layanan->nama_layanan }}</h5>
                                            <p class="mt-2 mb-0">{{ $layanan->deskripsi_layanan }}</p>
                                        </div>
                                    </div> --}}
                                    <div class="col-md-4">
                                        <div class="card m-auto layanan-card" style="width: 18rem;">
                                            <div class="card-body my-4">
                                              <h5 class="card-title">{{ $layanan->nama_layanan }}</h5>
                                              <div class="py-4"><img class="img-fluid m-auto"
                                                src="{{ url($layanan->gambar_layanan) }}"
                                                style="width: 90px; height: 90px;display: block;"
                                                alt="" /></div>
                                              <p class="card-text">{{ $layanan->deskripsi_layanan }}</p>
                                      
                                            </div>
                                          </div>
                                    </div>
                                   
                                @endforeach


                            </div>
                            {{-- <a class="btn btn-lg btn-primary rounded-pill hover-top" href="#"
                                role="button">See all</a> --}}
                        </div>
                    </div>
                </div>
            </div>
            <!-- end of .container-->

        </section>
        <!-- <section> close ============================-->
        <!-- ============================================-->

        <!-- ============================================-->
        <!-- <section> begin ============================-->
        {{-- <section class="py-7">

            <div class="container">
                <div class="row">
                    <div class="col-12 mx-auto align-items-center text-center">
                        <p class="mb-4">Trusted by companies like</p>
                    </div>
                </div>
                <div class="row align-items-center justify-content-center justify-content-lg-around">
                    <div class="col-6 col-sm-4 col-md-4 col-lg-2 px-md-0 mb-5 mb-lg-0 text-center"><img
                            src="assets/img/gallery/company-1.png" alt="" /></div>
                    <div class="col-6 col-sm-4 col-md-4 col-lg-2 px-md-0 mb-5 mb-lg-0 text-center"><img
                            src="assets/img/gallery/company-2.png" alt="" /></div>
                    <div class="col-6 col-sm-4 col-md-4 col-lg-2 px-md-0 mb-5 mb-lg-0 text-center"><img
                            src="assets/img/gallery/company-3.png" alt="" /></div>
                    <div class="col-6 col-sm-4 col-md-4 col-lg-2 px-md-0 mb-5 mb-lg-0 text-center"><img
                            src="assets/img/gallery/company-4.png" alt="" /></div>
                    <div class="col-6 col-sm-4 col-md-4 col-lg-2 px-md-0 mb-5 mb-lg-0 text-center"><img
                            src="assets/img/gallery/company-1.png" alt="" /></div>
                </div>
            </div>
            <!-- end of .container-->

        </section> --}}
        <!-- <section> close ============================-->
        <!-- ============================================-->


        <section class="py-5 mb-4" id="visi-misi">
            <div class="container-lg">
                <div class="row align-items-center">
                    <div class="col-md-6 col-lg-6 order-md-0 text-center text-md-start mt-2"><img class="img-fluid rounded"
                            src="{{ url(SettingHelper::get('visi_misi_image')) }}" width="400" alt="" />
                    </div>
                    <div class="col-md-6 col-lg-6 px-sm-5 px-md-0 mt-2">
                        <h6 class="fw-bold fs-4 display-3 lh-sm mb-4 text-center pt-2">Visi & Misi</h6>

                        <div class="d-flex align-items-center mb-5">
                            
                            <div class="px-4">
                                <h5 class="fw-bold">Visi</h5>
                                <p>{{ SettingHelper::get('visi') }}</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-5">
                            
                            <div class="px-4">
                                <h5 class="fw-bold ">Misi</h5>
                                <p>{{ SettingHelper::get('misi') }}</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>



        <!-- ============================================-->
        <!-- <section> begin ============================-->
        <section class="py-6" id="struktur">

            <div class="container">
                <div class="row align-items-center">

                    <div class="col-md-12 text-center">
                        <h6 class="fw-bold fs-4 display-3 lh-sm">Struktur Organisasi</h6>

                    </div>
                    <div class="col-md-12">
                        <div id="myDiagramDiv"
                            style="background-color: rgb(242, 242, 242); border: 1px solid black; width: 100%; height: 700px; position: relative; -webkit-tap-highlight-color: rgba(255, 255, 255, 0); cursor: auto;">

                        </div>
                    </div>
                </div>
            </div>
            <!-- end of .container-->

        </section>
        <!-- <section> close ============================-->
        <!-- ============================================-->


        <section class="py-8" id="kontak">

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 text-center mb-3">
                        <h6 class="fw-bold fs-4 display-3 lh-sm mb-3">Kontak</h6>
                        <p class="mb-5">Silahkan hubungi nomor dan alamat kontak berikut</p>
                    </div>
                </div>
                <div class="row flex-center">
                    <div class="col-lg-4 col-md-8">
                        <ul>
                            @foreach ($kontaks as $kontak)
                                <li>{{ $kontak->tipe }} : {{ $kontak->kontak }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <!-- end of .container-->

        </section>




        <!-- ============================================-->
        <!-- <section> begin ============================-->
        <section class="py-8 bg-1000">

            <div class="container">

                <div class="row" style="margin-bottom: 50px;">

                    <div class="col-md-4">
                        <img src="{{ url(SettingHelper::get('app_logo')) }}" alt="" width="75">
                        <span class="brand-title text-light">
                            {{ SettingHelper::get('app_name') }}
                        </span>
                    </div>
                    <div class="col-md-4">
                        <h3 class="text-light" style="margin-bottom: 20px;">Alamat</h3>
                        <p class="text-light">
                            {{ SettingHelper::get('alamat') }}
                        </p>
                    </div>
                    <div class="col-md-4">
                        <h3 class="text-light" style="margin-bottom: 20px;">Kontak</h3>
                        <ul>
                            @foreach ($kontaks as $kontak)
                                <li class="text-light">{{ $kontak->tipe }} : {{ $kontak->kontak }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="row flex-center">
                    <div class="col-auto">
                        <p class="mb-0 fs--1 text-700">&copy; {{ SettingHelper::get('app_name') }}
                        </p>
                    </div>
                </div>
            </div>
            <!-- end of .container-->

        </section>
        <!-- <section> close ============================-->
        <!-- ============================================-->


    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->




    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="{{ url('vendors/@popperjs/popper.min.js') }}"></script>
    <script src="{{ url('vendors/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ url('vendors/is/is.min.js') }}"></script>
    <script src="{{ url('https://polyfill.io/v3/polyfill.min.js?features=window.scroll') }}"></script>
    <script src="{{ url('assets/js/theme.js') }}"></script>

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400&amp;display=swap"
        rel="stylesheet">
    <script src="https://unpkg.com/gojs@2.3.10/release/go.js"></script>
    <script id="code">
        function init() {

            // Since 2.2 you can also author concise templates with method chaining instead of GraphObject.make
            // For details, see https://gojs.net/latest/intro/buildingObjects.html
            const $ = go.GraphObject.make; // for conciseness in defining templates

            // some constants that will be reused within templates
            var mt8 = new go.Margin(8, 0, 0, 0);
            var mr8 = new go.Margin(0, 8, 0, 0);
            var ml8 = new go.Margin(0, 0, 0, 8);
            var roundedRectangleParams = {
                parameter1: 2, // set the rounded corner
                spot1: go.Spot.TopLeft,
                spot2: go.Spot.BottomRight // make content go all the way to inside edges of rounded corners
            };

            myDiagram =
                new go.Diagram("myDiagramDiv", // the DIV HTML element
                    {
                        // Put the diagram contents at the top center of the viewport
                        initialDocumentSpot: go.Spot.Top,
                        initialViewportSpot: go.Spot.Top,
                        // OR: Scroll to show a particular node, once the layout has determined where that node is
                        // "InitialLayoutCompleted": e => {
                        //  var node = e.diagram.findNodeForKey(28);
                        //  if (node !== null) e.diagram.commandHandler.scrollToPart(node);
                        // },
                        layout: $(go.TreeLayout, // use a TreeLayout to position all of the nodes
                            {
                                isOngoing: false, // don't relayout when expanding/collapsing panels
                                treeStyle: go.TreeLayout.StyleLastParents,
                                // properties for most of the tree:
                                angle: 90,
                                layerSpacing: 80,
                                // properties for the "last parents":
                                alternateAngle: 0,
                                alternateAlignment: go.TreeLayout.AlignmentStart,
                                alternateNodeIndent: 15,
                                alternateNodeIndentPastParent: 1,
                                alternateNodeSpacing: 15,
                                alternateLayerSpacing: 40,
                                alternateLayerSpacingParentOverlap: 1,
                                alternatePortSpot: new go.Spot(0.001, 1, 20, 0),
                                alternateChildPortSpot: go.Spot.Left
                            })
                    });

            // This function provides a common style for most of the TextBlocks.
            // Some of these values may be overridden in a particular TextBlock.
            function textStyle(field) {
                return [{
                        font: "12px Roboto, sans-serif",
                        stroke: "rgba(0, 0, 0, .60)",
                        visible: false // only show textblocks when there is corresponding data for them
                    },
                    new go.Binding("visible", field, val => val !== undefined)
                ];
            }

            // define Converters to be used for Bindings
            function theNationFlagConverter(nation) {
                return "https://www.nwoods.com/images/emojiflags/" + nation + ".png";
            }

            // define the Node template
            myDiagram.nodeTemplate =
                $(go.Node, "Auto", {
                        locationSpot: go.Spot.Top,
                        isShadowed: true,
                        shadowBlur: 1,
                        shadowOffset: new go.Point(0, 1),
                        shadowColor: "rgba(0, 0, 0, .14)",
                        selectionAdornmentTemplate: // selection adornment to match shape of nodes
                            $(go.Adornment, "Auto",
                                $(go.Shape, "RoundedRectangle", roundedRectangleParams, {
                                    fill: null,
                                    stroke: "#7986cb",
                                    strokeWidth: 3
                                }),
                                $(go.Placeholder)
                            ) // end Adornment
                    },
                    $(go.Shape, "RoundedRectangle", roundedRectangleParams, {
                            name: "SHAPE",
                            fill: "#ffffff",
                            strokeWidth: 0
                        },
                        // gold if highlighted, white otherwise
                        new go.Binding("fill", "isHighlighted", h => h ? "gold" : "#ffffff").ofObject()
                    ),
                    $(go.Panel, "Vertical",
                        $(go.Panel, "Horizontal", {
                                margin: 8
                            },

                            $(go.Panel, "Table",
                                $(go.TextBlock, {
                                        row: 0,
                                        alignment: go.Spot.Left,
                                        font: "16px Roboto, sans-serif",
                                        stroke: "rgba(0, 0, 0, .87)",
                                        maxSize: new go.Size(160, NaN)
                                    },
                                    new go.Binding("text", "name")
                                ),
                                $(go.TextBlock, textStyle("title"), {
                                        row: 1,
                                        alignment: go.Spot.Left,
                                        maxSize: new go.Size(160, NaN)
                                    },
                                    new go.Binding("text", "title")
                                ),

                            )
                        ),


                    )
                );

            // define the Link template, a simple orthogonal line
            myDiagram.linkTemplate =
                $(go.Link, go.Link.Orthogonal, {
                        corner: 5,
                        selectable: false
                    },
                    $(go.Shape, {
                        strokeWidth: 3,
                        stroke: "#424242"
                    })); // dark gray, rounded corner links


            // set up the nodeDataArray, describing each person/position
            var nodeDataArray = [];
            var modelJson = {!! SettingHelper::get('struktur_organisasi') !!};
            var defaultModel = new go.TreeModel({
                nodeParentKeyProperty: "boss", // this property refers to the parent node data
                nodeDataArray: nodeDataArray
            });

            // create the Model with data for the tree, and assign to the Diagram
            myDiagram.model = (modelJson != null) ? go.Model.fromJson(modelJson) : defaultModel;


        }

        // the Search functionality highlights all of the nodes that have at least one data property match a RegExp
        function searchDiagram() { // called by button
            var input = document.getElementById("mySearch");
            if (!input) return;
            myDiagram.focus();

            myDiagram.startTransaction("highlight search");

            if (input.value) {
                // search four different data properties for the string, any of which may match for success
                // create a case insensitive RegExp from what the user typed
                var safe = input.value.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
                var regex = new RegExp(safe, "i");
                var results = myDiagram.findNodesByExample({
                    name: regex
                }, {
                    nation: regex
                }, {
                    title: regex
                }, {
                    headOf: regex
                });
                myDiagram.highlightCollection(results);
                // try to center the diagram at the first node that was found
                if (results.count > 0) myDiagram.centerRect(results.first().actualBounds);
            } else { // empty string only clears highlighteds collection
                myDiagram.clearHighlighteds();
            }

            myDiagram.commitTransaction("highlight search");
        }
        window.addEventListener('DOMContentLoaded', init);
    </script>
</body>

</html>
