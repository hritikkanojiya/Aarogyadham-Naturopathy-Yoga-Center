<?php

echo '  <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="menu-title"> <span>Main</span>
                        </li>
                        <li class="active" > <a href="dashboard.php"><i class="feather-home"></i><span class="shape1"></span><span class="shape2"></span><span>Dashboard</span></a>
                        </li>
                        <li class="submenu" ><a href="#"><i class="feather-user"></i> <span>Patients</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="recordsheet.php">Record Sheet</a></li>
                                <li><a href="patients-profile.html">Patient Profile</a></li>
                                <li><a href="patients-history.html">History</a></li>
                                <li><a href="patients-report.html">Report</a></li>
                                <li><a href="patients-documents.html">Documents</a></li>
                                <li><a href="patients-transactions.html">Transactions</a></li>
                                <li><a href="patients-issues.html">Issues</a></li>
                                <li><a href="patients-data.html">External Data</a></li>
                            </ul>
                        </li>
                        <li class=""><a href="appointments.html"><i class="feather-list"></i> <span>Appointments</span><span class="badge bg-success-text">2</span></a>
                        </li>
                        <li class=""><a href="flow-board.html"><i class="feather-bar-chart"></i> <span>Flow Board</span></a>
                        </li>
                        <li class=""><a href="recall-board.html"><i class="feather-calendar"></i> <span>Recall Board</span></a>
                        </li>
                        <li class=""><a href="chat.html"><i class="feather-message-circle"></i> <span>Messages</span><span class="badge bg-orange-text">4</span></a>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="feather-disc"></i> <span> Procedures</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="electronics-report.html">Electronics Reports</a></li>
                                <li><a href="lab-documents.html">Lab Documents</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><i class="feather-book"></i> <span>Reports</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li class="submenu">
                                    <a href="javascript:void(0);"> <span>Clients</span> <span class="menu-arrow"></span></a>
                                    <ul style="display: none;">
                                        <li><a href="client-list.html"><span>List</span></a></li>
                                        <li>
                                            <a href="client-rx.html"> <span>RX</span></a>
                                        </li>
                                        <li>
                                            <a href="patient-list.html"> <span>Patient List Creation</span></a>
                                        </li>
                                        <li>
                                            <a href="clinical-report.html"> <span>Clinical</span></a>
                                        </li>
                                        <li>
                                            <a href="referals-report.html"> <span>Reference</span></a>
                                        </li>
                                        <li>
                                            <a href="immunization-registry.html"> <span>Immunization Registry</span></a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"> <span>Clinics</span> <span class="menu-arrow"></span></a>
                                    <ul style="display: none;">
                                        <li><a href="report-results.html"><span>Report Results</span></a></li>
                                        <li>
                                            <a href="standard-measures.html"> <span>Standard Measures</span></a>
                                        </li>
                                        <li>
                                            <a href="quality-measures.html"> <span>Quality Measures (CQM)</span></a>
                                        </li>
                                        <li>
                                            <a href="automated-measures.html"> <span>Automated Measures (AMC)</span></a>
                                        </li>
                                        <li>
                                            <a href="amc-tracking.html"> <span>AMC Tracking</span></a>
                                        </li>
                                        <li>
                                            <a href="alert-log.html"> <span>Alerts Log</span></a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"> <span>Visits</span> <span class="menu-arrow"></span></a>
                                    <ul style="display: none;">
                                        <li><a href="appointments-visit.html"><span>Appointments</span></a></li>
                                        <li>
                                            <a href="flow-board-record.html"> <span>Patient Flow Board</span></a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"> <span>Procedure</span> <span class="menu-arrow"></span></a>
                                    <ul style="display: none;">
                                        <li><a href="pending-orders.html"><span>Pending Res</span></a></li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"> <span>Insurance</span> <span class="menu-arrow"></span></a>
                                    <ul style="display: none;">
                                        <li><a href="unique-insurance.html"><span>Unique SP</span></a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="settings.html"><i class="feather-settings"></i> <span>Settings</span></a>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="feather-grid"></i> <span> Application</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="calendar.html">Calendar</a></li>
                                <li><a href="inbox.html">Email</a></li>
                            </ul>
                        </li>
                        <li class="menu-title">
                            <span>Pages</span>
                        </li>
                        <li>
                            <a href="profile.html"><i class="feather-user-plus"></i> <span>Profile</span></a>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="feather-lock"></i> <span> Authentication </span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="index.php"> Login </a></li>
                                <li><a href="registration.php"> Register </a></li>
                                <li><a href="forgot-password.html"> Forgot Password </a></li>
                                <li><a href="lock-screen.html"> Lock Screen </a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="feather-alert-octagon"></i> <span> Error Pages </span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="error-404.html">404 Error </a></li>
                                <li><a href="error-500.html">500 Error </a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="users.html"><i class="feather-user"></i> <span>Users</span></a>
                        </li>
                        <li>
                            <a href="blank-page.html"><i class="feather-file"></i> <span>Blank Page</span></a>
                        </li>
                        <li>
                            <a href="maps-vector.html"><i class="feather-map-pin"></i> <span>Vector Maps</span></a>
                        </li>
                        <li class="menu-title">
                            <span>UI Interface</span>
                        </li>
                        <li>
                            <a href="components.html"><i class="feather-layers"></i> <span>Components</span></a>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="feather-sidebar"></i> <span> Forms </span> <span class="menu-arrow"></span></a>
                            <ul>
                                <!-- <li><a href="form-basic-inputs.html">Basic Inputs </a></li>
                                <li><a href="form-input-groups.html">Input Groups </a></li> -->
                                <li><a href="registration-form.html">Registration Form </a></li>
                                <!-- <li><a href="form-vertical.html"> Vertical Form </a></li>
                                <li><a href="form-mask.html"> Form Mask </a></li>
                                <li><a href="form-validation.html"> Form Validation </a></li> -->
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="feather-layout"></i> <span> Tables </span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="tables-basic.html">Basic Tables </a></li>
                                <li><a href="data-tables.html">Data Table </a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>';
