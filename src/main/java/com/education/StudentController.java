package com.eduignite.controller;

import java.util.List;
import java.util.Optional;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.CrossOrigin;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.PutMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import com.eduignite.entity.Course;
import com.eduignite.entity.Student;
import com.eduignite.repository.CourseRepository;
import com.eduignite.repository.StudentRepository;

@RestController
@RequestMapping("/api/students")
@CrossOrigin("*")
public class StudentController {

    @Autowired
    private StudentRepository studentRepo;

    @Autowired
    private CourseRepository courseRepo;

    // ===================== REGISTER =====================
    @PostMapping("/register")
    public ResponseEntity<?> register(@RequestBody Student student) {

        // Check duplicate email
        if (studentRepo.findByEmail(student.getEmail()) != null) {
            return ResponseEntity.badRequest().body("Email already registered!");
        }

        // Validate course
        if (student.getCourse() == null || student.getCourse().getId() == null) {
            return ResponseEntity.badRequest().body("Course must be selected!");
        }

        Optional<Course> courseOpt = courseRepo.findById(student.getCourse().getId());
        if (!courseOpt.isPresent()) {
            return ResponseEntity.badRequest().body("Invalid Course ID!");
        }

        student.setCourse(courseOpt.get());
        studentRepo.save(student);

        return ResponseEntity.ok("Student registered successfully!");
    }

    // ===================== LOGIN =====================
    @PostMapping("/login")
public ResponseEntity<?> login(@RequestBody Student student) {

    Student existing = studentRepo.findByEmailAndPassword(
            student.getEmail(), student.getPassword());

    if (existing == null) {
        return ResponseEntity.status(401).body("Invalid email or password!");
    }

    return ResponseEntity.ok(existing);
}

    // ===================== GET PROFILE =====================
   @GetMapping("/profile/{id}")
public ResponseEntity<?> getProfile(@PathVariable Long id) {
    Optional<Student> studentOpt = studentRepo.findById(id);
    if (studentOpt.isPresent()) {
        return ResponseEntity.ok(studentOpt.get());
    }
    return ResponseEntity.status(404).body("Student not found");
}


    // ===================== UPDATE PROFILE =====================
   @PutMapping("/update")
public ResponseEntity<?> updateProfile(@RequestBody Student student) {

    if (student.getStudentId() == null) {
        return ResponseEntity.badRequest().body("Student ID required");
    }

    Optional<Student> existingOpt = studentRepo.findById(student.getStudentId());

    if (!existingOpt.isPresent()) {
        return ResponseEntity.status(404).body("Student not found");
    }

    Student existing = existingOpt.get();
    existing.setName(student.getName());
    existing.setEmail(student.getEmail());
    existing.setContact(student.getContact());
    existing.setPassword(student.getPassword());

    if (student.getCourse() != null && student.getCourse().getId() != null) {
        courseRepo.findById(student.getCourse().getId())
                .ifPresent(existing::setCourse);
    }

    studentRepo.save(existing);
    return ResponseEntity.ok(existing);
}

    // ===================== VIEW COURSES =====================
    @GetMapping("/courses")
    public ResponseEntity<List<Course>> viewCourses() {
        return ResponseEntity.ok(courseRepo.findAll());
    }
}
