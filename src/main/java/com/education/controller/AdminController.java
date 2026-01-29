package com.education.controller;

import com.eduignite.model.Admin;
import com.eduignite.entity.Student;
import com.eduignite.entity.Course;
import com.eduignite.repository.CourseRepository;
import com.eduignite.repository.AdminRepository;
import com.eduignite.repository.StudentRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.*;

@Controller
@RequestMapping("/admin")
public class AdminController {

    @Autowired
    private AdminRepository adminRepository;

    @Autowired
    private StudentRepository studentRepository;

    @PostMapping("/login")
    public String login(@RequestParam String username,
                        @RequestParam String password) {
        Admin admin = adminRepository.findByUsernameAndPassword(username, password);
        if (admin != null) {
            return "redirect:/admin-dashboard.html";
        } else {
            return "redirect:/admin-login.html?error=true";
        }
    }

 @Autowired
private CourseRepository courseRepository;

@PostMapping("/addStudent")
public String addStudent(@RequestParam String name,
                         @RequestParam String email,
                         @RequestParam String password,
                         @RequestParam String contact,
                         @RequestParam Long courseId) {

    Student student = new Student();
    student.setName(name);
    student.setEmail(email);
    student.setPassword(password);
    student.setContact(contact);

    Course course = courseRepository.findById(courseId)
                    .orElseThrow(() -> new RuntimeException("Course not found"));

    student.setCourse(course);

    studentRepository.save(student);

    return "redirect:/add-student.html?success=true";
}

}
