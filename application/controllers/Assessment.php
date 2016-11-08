<?php

class assessment extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('studentmodel');
        $this->load->model('managedatabase');
        $this->load->model('assessmentmodel');
        $this->load->model('teachermodel');
        $this->load->model('documentmodel');
        $this->load->model('orientationmodel');
        if ($user_teacher = $this->session->userdata('user') == NULL) {
            redirect('login/Login');
        }
    }

    public function showassessment() {
        $user_teacher = $this->session->userdata('user');
        $year = $this->teachermodel->selectyear_max();
        $year1 = $year[0];
//        print_r($year);
        $semester = $this->teachermodel->selectyear_semester($year[0]['year']);
        $semester1 = $semester[0];
        $year_post['year'] = $this->input->post('year');
        $semester_post['semester'] = $this->input->post('semester');
//        print_r($semester_post);
        if ($user_teacher['function'] != 1) {
            if ($year_post['year'] != 0) {
                $datastudent = $this->orientationmodel->getByteacher_ID_orientation($user_teacher['teacher_id'], $year_post['year'], $semester_post['semester']);
//                print_r($datastudent);
            } else {
                $datastudent = $this->orientationmodel->getByteacher_ID_orientation($user_teacher['teacher_id'], $year1['year'], $semester1['semester']);
//                print_r($datastudent);
//                echo $this->db->last_query();
            }
//            print_r($datastudent);
            foreach ($datastudent as $key => $value) {
//                $where['teacher_id'] = $user_teacher['teacher_id'];
                if ($year_post['year'] != 0) {
                    $where['year'] = $year_post['year'];
                } else {
                    $where['year'] = $year1['year'];
                }

                $where['id_st'] = $value['id_st'];
                $table = "assessment_student";
                $datastudent_p = $this->managedatabase->getpoint_as_student($where, $table);

                $datastudent[$key]['score'] = null;

                if ($datastudent_p <> null) {
                    $colum = array(
                        'number1_1',
                        'number1_2',
                        'number1_3',
                        'number1_4',
                        'number1_5',
                        'number1_6',
                        'number1_7',
                        'number2',
                        'number3',
                        'number4',
                        'number5',
                        'number6_1',
                        'number6_2',
                        'number6_3',
                        'number6_4',
                        'number7',
                    );


                    foreach ($datastudent_p as $key1 => $value1) {
                        $sum = 0;
                        for ($i = 0; $i <= 15; $i++) {
                            $sum += $value1[$colum[$i]];
                        }
                        $datastudent_p[$key1]['avg'] = number_format($sum / 16, 2);
                    }
                    $datastudent[$key]['score'] = $datastudent_p[0];
                }
            }
            if ($year_post['year'] != 0) {
                $data['detail_st'] = $datastudent;
                $this->load->view('document/newassessment_st', $data);
            } else {
                $year = $this->teachermodel->year();
                $data['year'] = $year;
                $data['detail_st'] = $datastudent;
//                print_r($data);
                $this->load->view('template/header', $user_teacher);
                $this->load->view('include/navigation');
                $this->load->view('template/sidebar_teacher');
                $this->load->view('document/showassessment', $data);
                $this->load->view('include/foot');
            }
        } else {
            if ($year_post['year'] != 0) {
                $datastudent = $this->studentmodel->getrelation($year_post['year'], $semester_post['semester']);
//                print_r($data)
                $data['orient'] = $this->assessmentmodel->datastudent($year_post['year'], $semester_post['semester']);
            } else {
                $datastudent = $this->studentmodel->getrelation($year1['year'], $semester1['semester']);
                $data['orient'] = $this->assessmentmodel->datastudent($year1['year'], $semester1['semester']);
//                echo $this->db->last_query();
//                print_r($datastudent_st);
            }
            if ($datastudent != NULL) {

                foreach ($datastudent as $key => $value) {
//                print_r($datastudent);
//                $where['teacher_id'] = $user_teacher['teacher_id'];
                    if ($year_post['year'] != 0) {
                        $where['year'] = $year_post['year'];
                        $where['semester'] = $semester_post['semester'];
                    } else {
                        $where['year'] = $year1['year'];
                        $where['semester'] = $semester1['semester'];
                    }

                    $where['id_st'] = $value['id_st'];
                    $table = "assessment_student";
                    $datastudent_p = $this->managedatabase->getpoint_as_student($where, $table);

                    $datastudent[$key]['score'] = null;

                    if ($datastudent_p <> null) {
                        $colum = array(
                            'number1_1',
                            'number1_2',
                            'number1_3',
                            'number1_4',
                            'number1_5',
                            'number1_6',
                            'number1_7',
                            'number2',
                            'number3',
                            'number4',
                            'number5',
                            'number6_1',
                            'number6_2',
                            'number6_3',
                            'number6_4',
                            'number7',
                        );


                        foreach ($datastudent_p as $key1 => $value1) {
                            $sum = 0;
                            for ($i = 0; $i <= 15; $i++) {
                                $sum += $value1[$colum[$i]];
                            }
                            $datastudent_p[$key1]['avg'] = number_format($sum / 16, 2);
                        }
                        $datastudent[$key]['score'] = $datastudent_p[0];
                    }
                }
            }
            if ($year_post['year'] != 0) {
                $data['detail_st'] = $datastudent;

                $this->load->view('document/newassessment_st', $data);
            } else {
                $data['year'] = $this->teachermodel->year();
                $data['detail_st'] = $datastudent;
//                print_r($data['detail_st']);
                $this->load->view('template/header', $user_teacher);
                $this->load->view('include/navigation');
                $this->load->view('template/sidebar_teacher');
                $this->load->view('document/showassessment', $data);
                $this->load->view('include/foot');
            }
        }



//echo $this->db->last_query();
//print_r($data);
    }

    public function form_assessment_st() {
        $user_teacher = $this->session->userdata('user');
        $this->load->view('template/header', $user_teacher);
        $this->load->view('include/navigation');
        $this->load->view('template/sidebar_teacher');
        $year = $this->teachermodel->selectyear_max();
        $year1 = $year[0];
        $semester = $this->teachermodel->selectyear_semester($year[0]['year']);
        $semester1 = $semester[0];
        $year_post['year'] = $this->uri->segment(3);
        $id_st = $this->uri->segment(4);
        if ($year_post['year'] != 0) {
            $student = array(
                'student_establish.year' => $year_post['year'],
//                'student_establish.semester' => $semester_post['semester'],
                'student.id_st' => $id_st
            );
        } else {
            $student = array(
                'student_establish.year' => $year1['year'],
                'student_establish.semester' => $semester1['semester'],
                'student.id_st' => $id_st
            );
        }
//print_r($year);
        $table1 = "student_establish";
        $datastudent['student'] = $this->assessmentmodel->getstudentByid($student, $table1);
//        print_r($datastudent['student']);
        if ($year_post['year'] != 0) {
            $data = array(
                'year' => $year_post['year'],
//                'semester' => $semester1['semester'],
                'id_st' => $id_st
            );
        } else {
            $data = array(
                'year' => $year1['year'],
//                'semester' => $semester1['semester'],
                'id_st' => $id_st
            );
        }
//        print_r($data);
        $table = "assessment_student";
        $datastudent['assessment'] = $this->managedatabase->getDb($data, $table);
//        print_r($datastudent);
//        $this->load->view('include/navigation');
//        $this->load->view('template/sidebar_teacher');
        $this->load->view('document/assessment_student', $datastudent);
        $this->load->view('template/foot');
    }

    public function addpoint_assessment_st() {
        $user_teacher = $this->session->userdata('user');
        $year = $this->teachermodel->selectyear_max();
        $year1 = $year[0];
        $semester = $this->teachermodel->selectyear_semester($year[0]['year']);
        $semester1 = $semester[0];
        $id_st = $this->input->post('id_st');
        $this->session->set_userdata('id_st', $id_st);
        $id_st = $this->session->userdata('id_st');

        $data = array(
            'id_st' => $this->input->post('id_st'),
            'number1_1' => $this->input->post('number1_1'),
            'number1_2' => $this->input->post('number1_2'),
            'number1_3' => $this->input->post('number1_3'),
            'number1_4' => $this->input->post('number1_4'),
            'number1_5' => $this->input->post('number1_5'),
            'number1_6' => $this->input->post('number1_6'),
            'number1_7' => $this->input->post('number1_7'),
            'number2' => $this->input->post('number2'),
            'number3' => $this->input->post('number3'),
            'number4' => $this->input->post('number4'),
            'number5' => $this->input->post('number5'),
            'number6_1' => $this->input->post('number6_1'),
            'number6_2' => $this->input->post('number6_2'),
            'number6_3' => $this->input->post('number6_3'),
            'number6_4' => $this->input->post('number6_4'),
            'number7' => $this->input->post('number7'),
            'year' => $year1['year'],
            'semester' => $semester1['semester'],
            'teacher_id' => $user_teacher['teacher_id']
        );
//        print_r($data);

        $where = array(
            'id_st' => $this->input->post('id_st'),
            'year' => $year1['year'],
            'semester' => $semester1['semester']
        );
        $table = "assessment_student";
        $this->managedatabase->addCheck($data, $where, $table);
//        echo $this->db->last_query();
//redirect('/assessment/showassessment' . "/" . $year);
        redirect("/assessment/showassessment?year=" . $year1['year']);
    }

    public function showassessment_establish() {
        $user_teacher = $this->session->userdata('user');
        $year = $this->teachermodel->selectyear_max();
        $year1 = $year[0];
        $semester = $this->teachermodel->selectyear_semester($year[0]['year']);
        $semester1 = $semester[0];
//        print_r($semester1);
        $year_post['year'] = $this->input->post('year');
        $semester_post['semester'] = $this->input->post('semester');
        if ($user_teacher['function'] != 1) {
            if ($year_post['year'] != 0) {
                $dataestablish = $this->orientationmodel->getdata_teacher($user_teacher['teacher_id'], $year_post['year'], $semester_post['semester']);
            } else {
                $dataestablish = $this->orientationmodel->getdata_teacher($user_teacher['teacher_id'], $year1['year'], $semester1['semester']);
            }
//            print_r($dataestablish);
            foreach ($dataestablish as $key => $value) {
//                $where['teacher_id'] = $user_teacher['teacher_id'];
                if ($year_post['year'] != 0) {
                    $where['year'] = $year_post['year'];
                    $where['semester'] = $semester_post['semester'];
                } else {
                    $where['year'] = $year1['year'];
                    $where['semester'] = $semester1['semester'];
                }

//                $where['semester'] = $semester1['semester'];
                $where['id_es'] = $value['id_es'];
                $table = "assessment_establish";

                $datastudent_score = $this->managedatabase->getpoint_as_student($where, $table);
                $dataestablish[$key]['score'] = null;

                if ($datastudent_score <> null) {
                    $colum = array(
                        'number1_1',
                        'number1_2',
                        'number2_1',
                        'number2_2',
                        'number2_3',
                        'number3_1',
                        'number4_1',
                        'number4_2',
                        'number4_3',
                        'number4_4',
                        'number4_5',
                        'number5_1',
                        'number5_2',
                        'number5_3',
                        'number5_4',
                        'number5_5',
                        'number5_6',
                        'number5_7',
                        'number5_8',
                        'number6',
                    );


                    foreach ($datastudent_score as $key1 => $value1) {
                        $sum = 0;
                        for ($i = 0; $i <= 19; $i++) {
                            $sum += $value1[$colum[$i]];
                        }
                        $datastudent_score[$key1]['avg'] = number_format($sum / 20, 2);
//echo number_format("1000000",2);
                    }
                    $dataestablish[$key]['score'] = $datastudent_score[0];
//print_r($dataestablish);
                }
            }
        } else {
//            $year_post['year'] = $this->input->post('year');
            if ($year_post['year'] != 0) {
                $dataestablish = $this->assessmentmodel->getdatastudent($year_post['year'], $semester_post['semester']);
            } else {
                $dataestablish = $this->assessmentmodel->getdatastudent($year1['year'], $semester1['semester']);
            }
//            echo $this->db->last_query();
//            print_r($dataestablish);
            foreach ($dataestablish as $key => $value) {
                if ($year_post['year'] != 0) {
                    $where['year'] = $year_post['year'];
                    $where['semester'] = $semester_post['semester'];
                } else {
                    $where['year'] = $year1['year'];
                    $where['semester'] = $semester1['semester'];
                }
//                print_r($year_post);
//                $where['semester'] = $semester1['semester'];
                $where['id_es'] = $value['id_es'];
                $table = "assessment_establish";

                $datastudent_score = $this->managedatabase->getpoint_as_student($where, $table);
                $dataestablish[$key]['score'] = null;

                if ($datastudent_score <> null) {
                    $colum = array(
                        'number1_1',
                        'number1_2',
                        'number2_1',
                        'number2_2',
                        'number2_3',
                        'number3_1',
                        'number4_1',
                        'number4_2',
                        'number4_3',
                        'number4_4',
                        'number4_5',
                        'number5_1',
                        'number5_2',
                        'number5_3',
                        'number5_4',
                        'number5_5',
                        'number5_6',
                        'number5_7',
                        'number5_8',
                        'number6',
                    );


                    foreach ($datastudent_score as $key1 => $value1) {
                        $sum = 0;
                        for ($i = 0; $i <= 19; $i++) {
                            $sum += $value1[$colum[$i]];
                        }
                        $datastudent_score[$key1]['avg'] = number_format($sum / 20, 2);
//echo number_format("1000000",2);
                    }
                    $dataestablish[$key]['score'] = $datastudent_score[0];
//print_r($dataestablish);
                }
            }
        }
        if ($year_post['year'] != 0) {
            $data['detail_es'] = $dataestablish;
            $this->load->view('document/newassessment_es', $data);
        } else {
            $this->load->view('template/header', $user_teacher);
            $this->load->view('include/navigation');
            $this->load->view('template/sidebar_teacher');
            $data['year'] = $this->teachermodel->year();
            $data['detail_es'] = $dataestablish;
            $this->load->view('document/showassessment_establish', $data);
            $this->load->view('include/foot');
        }
    }

    public function form_assessment_es($name) {
//        $user_teacher = $this->session->userdata('user');
        $user_teacher = $this->session->userdata('user');
        $this->load->view('template/header', $user_teacher);
        $this->load->view('include/navigation');
        $this->load->view('template/sidebar_teacher');

        $year = $this->teachermodel->selectyear_max();
        $year1 = $year[0];
        $semester = $this->teachermodel->selectyear_semester($year[0]['year']);
        $semester1 = $semester[0];
//        print_r($semester1);
        $year_post['year'] = $this->uri->segment(3);
//        print_r($year_post);
        $id_es = $this->uri->segment(4);
//        print_r($id_es);
        if ($year_post['year'] != 0) {
            $establish = array(
                'student_establish.year' => $year_post['year'],
                'establishment.id_es' => $id_es
            );
        } else {
            $establish = array(
                'student_establish.year' => $year1['year'],
                'establishment.id_es' => $id_es
            );
        }

//print_r($year);
        $table1 = "student_establish";
        $dataestablish['establish'] = $this->assessmentmodel->getestablishByid($establish, $table1);
//        print_r($dataestablish);
        if ($year_post['year'] != 0) {
            $data = array(
                'year' => $year_post['year'],
//                'semester' => $semester1['semester'],
                'id_es' => $id_es
            );
        } else {
            $data = array(
                'year' => $year1['year'],
//                'semester' => $semester1['semester'],
                'id_es' => $id_es
            );
        }

//        print_r($data);
        $table = "assessment_establish";
        $dataestablish['assessment'] = $this->managedatabase->getDb($data, $table);
//        print_r($dataestablish);
////        $dataestablish['avgData_es'] = $this->managedatabase->avgData($data2);
////        $dataestablish['sumData_es'] = $this->managedatabase->sumData($data2);
//        $dataestablish['year'] = $this->session->userdata('year');
//        print_r($dataestablish);
        $this->load->view('document/assessment_establish', $dataestablish);
    }

    public function addpoint_assessment_es() {
        $user_teacher = $this->session->userdata('user');
        $year = $this->teachermodel->selectyear_max();
        $year1 = $year[0];
        $semester = $this->teachermodel->selectyear_semester($year[0]['year']);
        $semester1 = $semester[0];

        $id_es = $this->input->post('id_es');
        $this->session->set_userdata('id_es', $id_es);
        $id_es = $this->session->userdata('id_es');

        $data = array(
            'id_st' => $this->input->post('id_st'),
            'id_es' => $this->input->post('id_es'),
            'number1_1' => $this->input->post('number1_1'),
            'number1_2' => $this->input->post('number1_2'),
            'number2_1' => $this->input->post('number2_1'),
            'number2_2' => $this->input->post('number2_2'),
            'number2_3' => $this->input->post('number2_3'),
            'number3_1' => $this->input->post('number3_1'),
            'number4_1' => $this->input->post('number4_1'),
            'number4_2' => $this->input->post('number4_2'),
            'number4_3' => $this->input->post('number4_3'),
            'number4_4' => $this->input->post('number4_4'),
            'number4_5' => $this->input->post('number4_5'),
            'number5_1' => $this->input->post('number5_1'),
            'number5_2' => $this->input->post('number5_2'),
            'number5_3' => $this->input->post('number5_3'),
            'number5_4' => $this->input->post('number5_4'),
            'number5_5' => $this->input->post('number5_5'),
            'number5_6' => $this->input->post('number5_6'),
            'number5_7' => $this->input->post('number5_7'),
            'number5_8' => $this->input->post('number5_8'),
            'number6' => $this->input->post('number6'),
            'year' => $year1['year'],
            'semester' => $semester1['semester'],
            'teacher_id' => $user_teacher['teacher_id']
        );

//print_r($data);
        $where = array(
            'id_es' => $this->input->post('id_es'),
            'year' => $year1['year'],
            'semester' => $semester1['semester'],
        );
        $this->managedatabase->addCheck($data, $where, "assessment_establish");
        redirect("/assessment/showassessment_establish?year=" . $year1['year']);
//redirect('/assessment/showassessment_establish' . "/" . $year);
    }

// public function indee() {
//     $this->load->view('test2');
// }
}

?>