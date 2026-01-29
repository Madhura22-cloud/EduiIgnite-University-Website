package com.eduignite.repository;

import org.springframework.data.jpa.repository.JpaRepository;

import com.eduignite.entity.Student;

public interface StudentRepository extends JpaRepository<Student, Long> {

    Student findByEmail(String email);

    Student findByEmailAndPassword(String email, String password);
}
