<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class SchoolModel extends Model
{

    public function add_school_info($data)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('school_info');
        return  $builder->insert($data);
    }
    public function get_school($limit, $page, $key)
    {
        $page = ($page - 1) * $limit;
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->select('users.id,education_type,category,school_number,username,email,city,phone,school_name');
        $builder->join('school_info', 'users.id = school_info.school_id');
        $builder->where('role', 2);
        $builder->orderBy('users.create_date', 'DESC');
        if ($key == 'all') {
            $query   = $builder->get();
        } else {
            $query   = $builder->get($limit, $page);
        }

        return $query->getResult();
    }
    public function edit_school($data, $id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->where('id', $id);
        return  $builder->update($data);
    }
    public function edit_info($data, $id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('school_info');
        $builder->where('school_id', $id);
        return  $builder->update($data);
    }
    public function get_school_info_by_id($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('school_info');
        $builder->where('school_id', $id);
        $query   = $builder->get();
        return $query->getResult();
    }
    public function edit_service($data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('sevices_schools');
        $builder->where('school_id', $data['school_id']);
        $builder->where('service_id', $data['service_id']);
        return $builder->update($data);
        return $db->affectedRows();
    }
    public function add_service($data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('sevices_schools');

        $builder->insert($data);
        return $db->affectedRows();
    }

    public function get_service_by_id($service_id, $school_id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('sevices_schools');
        $builder->select('id');
        $builder->where('service_id', $service_id);
        $builder->where('school_id', $school_id);
        $query   = $builder->get();
        return $query->getRow();
    }
    public function get_services()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('service_school');
        $builder->select('id,name');
        $builder->orderBy('create_date', 'DESC');
        $query   = $builder->get();
        return $query->getResult();
    }

    public function get_school_by_id($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->select('users.id,education_type,category,school_number,username,email,city,phone,school_name');
        $builder->join('school_info', 'users.id = school_info.school_id');
        $builder->where('role', 2);
        $builder->where('users.id', $id);
        $query   = $builder->get();
        return $query->getRow();
    }

    public function get_school_by_number($number)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->select('users.id,education_type,category,school_number,username,email,city,phone,school_name');
        $builder->join('school_info', 'users.id = school_info.school_id');
        $builder->where('role', 2);
        $builder->where('school_info.school_number', $number);
        $query   = $builder->get();
        return $query->getRow();
    }

    public function delete_school($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->where('id', $id);
        $builder->delete();
        return $db->affectedRows();
    }

    public function delete_school_table($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('school_tables');
        $builder->where('id', $id);
        $builder->delete();
        return $db->affectedRows();
    }

    public function delete_school_exam_table($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('school_exam_table');
        $builder->where('id', $id);
        $builder->delete();
        return $db->affectedRows();
    }

    public function delete_class(array $data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('classes');
        $builder->whereIn('id', $data);
        $builder->delete();
        return $db->affectedRows();
    }

    public function update_class(array $data, $id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('classes');
        $builder->where('id', $id);
        return  $builder->update($data);
    }

    public function add_class(array $data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('classes');

        return $builder->insert($data);
    }

    public function get_classes()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('classes');
        $builder->select('id,name,code');

        $query   = $builder->get();
        return $query->getResult();
    }

    public function delete_level(array $ids)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('school_levels');
        $builder->whereIn('id', $ids);
        $builder->delete();
        return $db->affectedRows();
    }

    public function update_level(array $data, $id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('school_levels');
        $builder->where('id', $id);
        return  $builder->update($data);
    }

    public function add_level(array $data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('school_levels');

        return $builder->insert($data);
    }

    public function get_levels($school_id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('school_levels');
        $builder->where('school_id', $school_id);
        $query   = $builder->get();
        return $query->getResult();
    }



    public function delete_division(array $ids)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('schools_divisions');
        $builder->whereIn('id', $ids);
        $builder->delete();
        return $db->affectedRows();
    }

    public function update_division(array $data, $id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('schools_divisions');
        $builder->where('id', $id);
        return  $builder->update($data);
    }

    public function add_division(array $data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('schools_divisions');

        return $builder->insert($data);
    }

    public function get_divisions($school_id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('schools_divisions');
        $builder->where('school_id', $school_id);
        $query   = $builder->get();
        return $query->getResult();
    }




    public function get_classes_by_codes(array $codes)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('classes');
        $builder->select('id ,code');
        $builder->whereIn('code', $codes);

        $query   = $builder->get();
        return $query->getResult();
    }



    public function get_sections()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('sections');
        $builder->select('id,name');

        $query   = $builder->get();
        return $query->getResult();
    }
    public function get_subjects($level_id = null, $school_id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('subjects');
        $builder->select('id,name');
        if (!empty($level_id)) {
            $builder->where('level_id', $level_id);
            $builder->where('school_id', $level_id);
        }
        $query   = $builder->get();
        return $query->getResult();
    }
    public function get_period()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('period');
        $builder->select('id,name');

        $query   = $builder->get();
        return $query->getResult();
    }

    public function get_Semester()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('semaster');
        $builder->select('id,name');

        $query   = $builder->get();
        return $query->getResult();
    }

    public function get_semesters_by_names(array $names)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('semaster');
        $builder->select('id,name');
        $builder->whereIn('name', $names);

        $query   = $builder->get();
        return $query->getResult();
    }

    public function add_asbense($data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('absence_and_lag');

        // $builder->insert($data);
        return $builder->insert($data);
    }

    public function add_course_asbense($data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('courses_absence_and_lag');

        // $builder->insert($data);
        return $builder->insert($data);
    }

    public function update_asbense($data, $id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('absence_and_lag');
        $builder->where('id', $id);
        return  $builder->update($data);
    }

    public function update_course_asbense($data, $id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('courses_absence_and_lag');
        $builder->where('id', $id);
        return  $builder->update($data);
    }

    public function get_course_asbense($limit, $page, $school_id, $key)
    {
        $page = ($page - 1) * $limit;
        $db = \Config\Database::connect();
        $builder = $db->table('courses_absence_and_lag');
        $builder->select('courses_absence_and_lag.id as archive_id,courses.id student_id,student_name,student_number,courses.phone parent_phone,school_levels.title level_name,schools_divisions.title division_name,monitoring_case,period,date,message,send_status');
        $builder->join('courses', 'courses_absence_and_lag.student_id = courses.id');
        $builder->join('users', 'courses.phone = users.phone');
        $builder->join('school_levels', 'courses.level = school_levels.id', 'left');
        $builder->join('schools_divisions', 'courses.division = schools_divisions.id', 'left');
        $builder->where('role', 3);
        $builder->where('courses_absence_and_lag.school_id', $school_id);
        $builder->orderBy('courses_absence_and_lag.create_date', 'DESC');
        if ($key == 'all') {
            $query   = $builder->get();
        } else {
            $query   = $builder->get($limit, $page);
        }
        
        return ($query->getResult());
    }

    public function get_course_asbense_reply($limit, $page, $school_id, $key)
    {
        $page = ($page - 1) * $limit;
        $db = \Config\Database::connect();
        $builder = $db->table('courses_absence_and_lag');
        $builder->select('courses_absence_and_lag.id,is_read,courses.id student_id,student_name,student_number,users.phone parent_phone,school_levels.title level_name,schools_divisions.title division_name,monitoring_case,period,date,message,reply');
        $builder->join('courses', 'courses_absence_and_lag.student_id = courses.id');
        $builder->join('users', 'courses.phone = users.phone');
        $builder->join('school_levels', 'courses.level = school_levels.id');
        $builder->join('schools_divisions', 'courses.division = schools_divisions.id');
        $builder->where('courses_absence_and_lag.school_id', $school_id);
        $builder->where('role', 3);
        $builder->orderBy('courses_absence_and_lag.create_date', 'DESC');
        if ($key == 'all') {
            $query = $builder->get();
        } else {
            $query = $builder->get($limit, $page);
        }
        
        return $query->getResult();
    }

    public function get_course_asbense_by_id($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('courses_absence_and_lag');
        $builder->select('id, is_read, monitoring_case, period, date, message, reply');
        $builder->where('id', $id);
        $query = $builder->get();
        return $query->getResult();
    }




    public function add_table_school($data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('school_tables');

        $builder->insert($data);
        return $db->affectedRows();
    }
    public function add_exam_table_school($data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('school_exam_table');

        $builder->insert($data);
        return $db->affectedRows();
    }

    public function get_student($limit, $page, $class_id = null, $semaster_id = null, $school_id, $key)
    {
        $page = ($page - 1) * $limit;
        $db = \Config\Database::connect();
        $builder = $db->table('students');
        $builder->select('students.id student_id,full_name,student_number,class_id,students.phone AS parent_phone,classes.name class_name,semaster.name ');
        // $builder->join('users', 'students.parent_id = users.id');
        $builder->join('classes', 'students.class_id = classes.id');
        $builder->join('semaster', 'students.semestar_id = semaster.id');
        // $builder->where('role', 3);

        if (!empty($class_id)) {
            $builder->where('class_id', $class_id);
        }
        if (!empty($semaster_id)) {
            $builder->where('semestar_id', $semaster_id);
        }
        $builder->where('school_id', $school_id);
        $builder->orderBy('students.create_date', 'DESC');
        if ($key == 'all') {
            $query   = $builder->get();
        } else {
            $query   = $builder->get($limit, $page);
        }
        return $query->getResult();
    }
    public function get_asbense($limit, $page, $school_id, $key)
    {
        $page = ($page - 1) * $limit;
        $db = \Config\Database::connect();
        $builder = $db->table('absence_and_lag');
        $builder->select('absence_and_lag.id as archive_id,students.id student_id,full_name,student_number,students.phone parent_phone,classes.name class_name,semaster.name semaster_name,monitoring_case,period,date,message,send_status');
        $builder->join('students', 'absence_and_lag.student_id = students.id');
        $builder->join('users', 'students.phone = users.phone');
        $builder->join('classes', 'students.class_id = classes.id');
        $builder->join('semaster', 'students.semestar_id = semaster.id');
        $builder->where('role', 3);
        $builder->where('absence_and_lag.school_id', $school_id);
        $builder->orderBy('absence_and_lag.create_date', 'DESC');
        if ($key == 'all') {
            $query   = $builder->get();
        } else {
            $query   = $builder->get($limit, $page);
        }
        return ($query->getResult());
    }
    public function get_asbense_reply($limit, $page, $school_id, $key)
    {
        $page = ($page - 1) * $limit;
        $db = \Config\Database::connect();
        $builder = $db->table('absence_and_lag');
        $builder->select('absence_and_lag.id,is_read,students.id student_id,full_name,student_number,users.phone parent_phone,classes.name class_name,semaster.name semaster_name,monitoring_case,period,date,message,reply');
        $builder->join('students', 'absence_and_lag.student_id = students.id');
        $builder->join('users', 'students.phone = users.phone');
        $builder->join('classes', 'students.class_id = classes.id');
        $builder->join('semaster', 'students.semestar_id = semaster.id');
        $builder->where('absence_and_lag.school_id', $school_id);
        $builder->where('role', 3);
        $builder->orderBy('absence_and_lag.create_date', 'DESC');
        if ($key == 'all') {
            $query = $builder->get();
        } else {
            $query = $builder->get($limit, $page);
        }
        return $query->getResult();
    }


    public function get_asbense_by_id($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('absence_and_lag');
        $builder->select('id, is_read, monitoring_case, period, date, message, reply');

        $builder->where('id', $id);
        $query = $builder->get();
        return $query->getResult();
    }


    public function get_service_by_school_id($school_id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('sevices_schools');
        $builder->select('id,status,end_date');
        $builder->where('school_id', $school_id);
        $query   = $builder->get();
        return $query->getResult();
    }
    public function add_parent_to_school($data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('parent_school');

        $builder->insert($data);
        return $db->affectedRows();
    }
    public function get_service_status_by_school_id($school_id, $service_id)
    {
        $db = \Config\Database::connect();
        $date = date('Y-m-d');
        $builder = $db->table('sevices_schools');
        $builder->select('id,status,end_date');
        $builder->where('school_id', $school_id);
        $builder->where('service_id', $service_id);
        $builder->where('status', 1);
        $builder->where('end_date>=', $date);
        $query   = $builder->get();
        return $query->getRow();
    }
    
    public function get_school_table($limit, $page, $school_id, $key)
    {
        $page = ($page - 1) * $limit;
        $db = \Config\Database::connect();
        $builder = $db->table('school_tables');
        $builder->select('school_tables.id, school_tables.file_path, CAST(school_tables.create_date AS DATE) date, classes.name class_name, semaster.name semester');
        $builder->join('classes', 'school_tables.class_id = classes.id');
        $builder->join('semaster', 'school_tables.semester_id = semaster.id');

        if (!empty($class)) {
            $builder->where('class_id', $class);
        }
        if (!empty($semaster_id)) {
            $builder->where('semestar_id', $semaster_id);
        }

        $builder->where('school_tables.school_id', $school_id);
        $builder->orderBy('school_tables.create_date', 'DESC');
        if ($key == 'all') {
            $query   = $builder->get();
        } else {
            $query   = $builder->get($limit, $page);
        }
        return $query->getResult();
    }


    public function get_parent_schools_tables($limit, $page, $key, array $school_id)
    {
        $page = ($page - 1) * $limit;
        $db = \Config\Database::connect();
        $builder = $db->table('school_tables');
        $builder->select('school_info.school_name, school_tables.id, school_tables.file_path, CAST(school_tables.create_date AS DATE) date, classes.name class_name, semaster.name semester');
        $builder->join('classes', 'school_tables.class_id = classes.id');
        $builder->join('semaster', 'school_tables.semester_id = semaster.id');
        $builder->join('school_info', 'school_tables.school_id = school_info.school_id');

        if (!empty($class)) {
            $builder->where('class_id', $class);
        }
        if (!empty($semaster_id)) {
            $builder->where('semestar_id', $semaster_id);
        }

        $builder->whereIn('school_tables.school_id', $school_id);
        $builder->orderBy('school_tables.create_date', 'DESC');
        if ($key == 'all') {
            $query   = $builder->get();
        } else {
            $query   = $builder->get($limit, $page);
        }
        return $query->getResult();
    }


    public function get_program_by_level($level_id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('school_table_type');
        $builder->select('id,name');
        $builder->where('educational_level', $level_id);
        $query   = $builder->get();
        return $query->getResult();
    }
    public function get_subject_by_program($program_id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('subjects');
        $builder->select('id,name');
        $builder->where('program_id', $program_id);
        $query   = $builder->get();
        return $query->getResult();
    }
    public function add_subject($data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('subjects');
        return $builder->insert($data);
    }
    public function add_program_name($data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('program_name');
        return $builder->insert($data);
    }
    public function add_exam_name($data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('exam_name');
        return $builder->insert($data);
    }
    public function get_program_school($school_id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('program_name');
        $builder->select('id,name');
        $builder->where('school_id', $school_id);
        $query   = $builder->get();
        return $query->getResult();
    }
    public function get_exam_school_name($school_id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('exam_name');
        $builder->select('id,name');
        $builder->where('school_id', $school_id);
        $query   = $builder->get();
        return $query->getResult();
    }
    // public function get_school_exam_table($limit, $page, $key, $class = null, $section = null, $program_id = null, $school_id)
    // {
    //     $page = ($page - 1) * $limit;
    //     $db = \Config\Database::connect();
    //     $builder = $db->table('exam_table');
    //     $builder->select('day,date,subject_id,subjects.name subject_name,classes.name class_name,exam_name.name program_name');
    //     $builder->join('subjects', 'exam_table.subject_id = subjects.id');
    //     $builder->join('classes', 'exam_table.class_id = classes.id');
    //     $builder->join('exam_name', 'exam_table.exam_id = exam_name.id');
    //     if (!empty($class)) {
    //         $builder->where('class_id', $class);
    //     }

    //     if (!empty($section)) {
    //         $builder->where('section_id', $section);
    //     }
    //     if (!empty($program_id)) {
    //         $builder->where('program_id', $section);
    //     }
    //     $builder->where('exam_table.school_id', $school_id);
    //     $builder->orderBy('exam_table.create_date', 'DESC');
    //     if ($key == 'all') {
    //         $query   = $builder->get();
    //     } else {
    //         $query   = $builder->get($limit, $page);
    //     }
    //     return $query->getResult();
    // }
    public function get_parent_exam_table($limit, $page, $key, $school_id)
    {
        $page = ($page - 1) * $limit;
        $school_id = explode(",", $school_id);
        $db = \Config\Database::connect();
        $builder = $db->table('exam_table');
        $builder->select('day,date,subject_id,subjects.name subject_name,classes.name class_name,exam_name.name program_name');
        $builder->join('subjects', 'exam_table.subject_id = subjects.id');
        $builder->join('classes', 'exam_table.class_id = classes.id');
        $builder->join('exam_name', 'exam_table.exam_id = exam_name.id');

        $builder->wherein('exam_table.school_id', $school_id);
        $builder->groupBy("exam_id");
        $builder->orderBy('exam_table.create_date', 'DESC');
        if ($key == 'all') {
            $query   = $builder->get();
        } else {
            $query   = $builder->get($limit, $page);
        }
        return $query->getResult();
    }
    public function get_parent_exam_table2($limit, $page, $key, $school_id)
    {
        $page = ($page - 1) * $limit;
        // $school_id=explode(",",$school_id);
        // var_dump($school_id);
        $db = \Config\Database::connect();
        $sql = '
       SELECT day,date,subjects.name subject_name,school_name
       FROM exam_table 
       join subjects on exam_table.subject_id = subjects.id left join school_info on exam_table.school_id = school_info.school_id
       where exam_table.school_id in (' . $school_id . ') and exam_id IN 
       ( 
       SELECT max(exam_id) 
       FROM exam_table
       group by school_id 
       );
         ';
        $query = $db->query($sql);
        return $query->getResult();
    }
    public function get_parent_school_table2($limit, $page, $key, $school_id)
    {
        $page = ($page - 1) * $limit;
        // $school_id=explode(",",$school_id);
        // var_dump($school_id);
        $db = \Config\Database::connect();
        $sql = '
       SELECT day,subjects.name subject_name,school_name,period.name
       FROM school_table 
       join subjects on school_table.subject_id = subjects.id left join school_info on school_table.school_id = school_info.school_id left join period on school_table.period = period.id
       where school_table.school_id in (' . $school_id . ') and school_table.program_id IN 
       ( 
       SELECT max(program_id) 
       FROM school_table
       group by school_id 
       );
         ';
        $query = $db->query($sql);
        return $query->getResult();
    }


    public function add_period($data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('period');
        return $builder->insert($data);
    }
    public function update_period($data, $id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('period');
        $builder->where('id', $id);
        return  $builder->update($data);
    }
    public function delete_period($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('period');
        $builder->where('id', $id);
        $builder->delete();
        return $db->affectedRows();
    }

    public function get_school_parent($school_id)
    {

        $school_id = explode(",", $school_id);
        $db = \Config\Database::connect();
        $builder = $db->table('school_info');
        $builder->select('school_id,school_name');
        $builder->wherein('school_id', $school_id);
        $builder->orderBy('create_date', 'DESC');

        $query   = $builder->get();


        return $query->getResult();
    }
    public function edit_absence_and_lag($data, $id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('absence_and_lag');
        $builder->where('id', $id);
        return  $builder->update($data);
    }

    public function getSchoolGateInfo($school_id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('schools_gates');
        $builder->select('gates.arabic_link,gates.english_link,schools_gates.password,schools_gates.username,schools_gates.sender_name');
        $builder->where('school_id', $school_id);
        $builder->join('gates', 'gates.id = schools_gates.gate_id');

        $query   = $builder->get();

        return $query->getResult();
    }

    public function updateSchoolGate($school_gate_id, array $data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('schools_gates');
        $builder->where('id', $school_gate_id);

        if ($data['isActive']) {
            $b = $db->table('schools_gates');
            $b->where('school_id', $data['school_id']);
            $b->update(['isActive' => false]);
        }

        return $builder->update($data);
    }

    public function insertSchoolGate(array $data)
    {
        $db = \Config\Database::connect();

        if ($data['isActive']) {
            $b = $db->table('schools_gates');
            $b->where('school_id', $data['school_id']);
            $b->update(['isActive' => false]);
        }

        $builder = $db->table('schools_gates');
        return  $builder->insert($data);
    }


    public function updateOrCreateSchoolGate($data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('schools_gates');
        $builder->where('school_id', $data['school_id']);
        $builder->where('gate_id', $data['gate_id']);
        $query   = $builder->get();

        if ($res = $query->getResult()) {
            return  $this->updateSchoolGate($res[0]->id, $data);
        } else {
            return  $this->insertSchoolGate($data);
        }
    }

    public function getSchoolGatesById($school_id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('schools_gates');
        $builder->select('gates.name as gate,gates.id as gate_id,schools_gates.id,schools_gates.password,schools_gates.username,schools_gates.sender_name,schools_gates.isActive'); //
        $builder->join('gates', 'gates.id = schools_gates.gate_id');
        $builder->where('school_id', $school_id);
        $query   = $builder->get();

        return $query->getResult();
    }

    public function getSchoolActiveGatesById($school_id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('schools_gates');
        $builder->select('gates.*, schools_gates.username, schools_gates.sender_name, schools_gates.password'); //
        $builder->join('gates', 'gates.id = schools_gates.gate_id');
        $builder->where('school_id', $school_id);
        $builder->where('isActive', 1);
        $query   = $builder->get();

        return $query->getResult();
    }

    public function deleteSchoolGate($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('schools_gates');
        $builder->where('id', $id);
        $builder->delete();
        return $db->affectedRows();
    }

    public function add_toSent($data)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('unsent_messages');
        $builder->insert($data);
        return $db->affectedRows();
    }

    public function get_unsent_messages($count = 50)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('unsent_messages');
        $builder->select(
            "gates.name as gates_name," .
                "gates.method as gates_method," .
                "gates.success_code," .
                "gates.arabic_link as gates_arabic_link," .
                "gates.latin_link as gates_latin_link," .
                "gates.isReturnStatus as gates_isReturnStatus," .
                "schools_gates.username," .
                "schools_gates.sender_name," .
                "schools_gates.password," .
                "unsent_messages.id as unsent_message_id," .
                "unsent_messages.message_archive_id," .
                "unsent_messages.message," .
                "unsent_messages.phone," .
                "unsent_messages.type"
        );
        $builder->join('schools_gates', 'unsent_messages.school_gate_id = schools_gates.id');
        $builder->join('gates', 'gates.id = schools_gates.gate_id');
        $builder->limit($count);
        // $builder->where('schools_gates.isActive', 1);
        $query   = $builder->get();
        return $query->getResult();
    }

    public function deleteFromUnsentMessage($ids)
    {
        if (count($ids) < 1) return;

        $db = \Config\Database::connect();
        $builder = $db->table('unsent_messages');
        $builder->whereIn('id', $ids);
        $builder->delete();
        return $db->affectedRows();
    }

    public function updateAbsenceArchiveMessagesStatus($ids, $status)
    {
        if (count($ids) < 1) return;

        $db = \Config\Database::connect();
        $builder = $db->table('absence_and_lag');
        $builder->whereIn('id', $ids);
        return  $builder->update(["send_status" => $status]);
    }

    public function updateCourseAbsenceArchiveMessagesStatus($ids, $status)
    {
        if (count($ids) < 1) return;

        $db = \Config\Database::connect();
        $builder = $db->table('courses_absence_and_lag');
        $builder->whereIn('id', $ids);
        return  $builder->update(["send_status" => $status]);
    }

    public function updatePublicMessagesArchiveMessagesStatus($ids, $status)
    {
        if (count($ids) < 1) return;

        $db = \Config\Database::connect();
        $builder = $db->table('public_messages');
        $builder->whereIn('id', $ids);
        return  $builder->update(["send_status" => $status]);
    }

    public function get_school_exam_table($limit, $page, $key, $school_id)
    {
        $page = ($page - 1) * $limit;
        $db = \Config\Database::connect();
        $builder = $db->table('school_exam_table');
        $builder->select('school_exam_table.id, school_exam_table.file_path, CAST(school_exam_table.create_date AS DATE) date, classes.name class_name, semaster.name semester');
        $builder->join('classes', 'school_exam_table.class_id = classes.id');
        $builder->join('semaster', 'school_exam_table.semester_id = semaster.id');

        if (!empty($class)) {
            $builder->where('class_id', $class);
        }

        $builder->where('school_exam_table.school_id', $school_id);
        $builder->orderBy('school_exam_table.create_date', 'DESC');
        if ($key == 'all') {
            $query   = $builder->get();
        } else {
            $query   = $builder->get($limit, $page);
        }
        return $query->getResult();
    }

    public function get_parent_schools_exam_tables($limit, $page, $key,array $schools_id)
    {
        $page = ($page - 1) * $limit;
        $db = \Config\Database::connect();
        $builder = $db->table('school_exam_table');
        $builder->select('school_info.school_name, school_exam_table.id, school_exam_table.file_path, CAST(school_exam_table.create_date AS DATE) date, classes.name class_name, semaster.name semester');
        $builder->join('classes', 'school_exam_table.class_id = classes.id');
        $builder->join('semaster', 'school_exam_table.semester_id = semaster.id');
        $builder->join('school_info', 'school_exam_table.school_id = school_info.school_id');

        if (!empty($class)) {
            $builder->where('class_id', $class);
        }

        $builder->whereIn('school_exam_table.school_id', $schools_id);
        $builder->orderBy('school_exam_table.create_date', 'DESC');
        if ($key == 'all') {
            $query   = $builder->get();
        } else {
            $query   = $builder->get($limit, $page);
        }
        return $query->getResult();
    }



    public function delete_semaster(array $data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('semaster');
        $builder->whereIn('id', $data);
        $builder->delete();
        return $db->affectedRows();
    }

    public function update_semaster(array $data, $id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('semaster');
        $builder->where('id', $id);
        return  $builder->update($data);
    }

    public function add_semaster(array $data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('semaster');

        return $builder->insert($data);
    }
}
