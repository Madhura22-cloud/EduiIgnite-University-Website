package com.eduignite.repository;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

import com.eduignite.model.ContactForm;

@Repository
public interface ContactFormRepository extends JpaRepository<ContactForm, Long> {
    // No extra code needed, basic CRUD is enough
}
