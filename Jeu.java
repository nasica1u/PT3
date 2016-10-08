import afficheur.Afficheur;
import physique.MoteurPhysique;
import java.awt.EventQueue;
import java.awt.*;
import java.awt.event.*;
import static java.awt.event.KeyEvent.*;
import javax.swing.*;
import physique.Monde;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author Reed
 */
public class Jeu extends JFrame implements KeyListener
{
    protected Afficheur af;
    protected MoteurPhysique mp;
    
    int n=0;
    boolean fini=false;
    
    public Jeu(String titre)
    {
        super(titre);
        
        // Personnalisation du PanelJeu
        Monde m = new Monde();
        af=new Afficheur(m);
        mp=new MoteurPhysique(m);
        af.addKeyListener(this);
        af.setFocusable(true);
        af.setPreferredSize(new Dimension(800,800));
        this.add(af);
    }
    
    public void update()
    {
        n++;
        if(n>10000) fini=true;
        mp.update();
    }
    
    public void render()
    {
        af.render();
    }
    
//----------------------------------------------------------------------------------------------------//
//--------------------------------------------KEY LISTENER--------------------------------------------//
//----------------------------------------------------------------------------------------------------//
    
    @Override
    public void keyTyped(KeyEvent e) {}

    @Override
    public void keyPressed(KeyEvent e) {
        processKeyPressed(e);
    }

    @Override
    public void keyReleased(KeyEvent e) {
        processKeyReleased(e);
    }
    
    public void processKeyPressed(KeyEvent e)
    {
        int i=e.getKeyCode();
        if(i==VK_LEFT) mp.setEtat(0, true);
        else if(i==VK_RIGHT) mp.setEtat(1, true);
        else if(i==VK_SPACE) mp.setEtat(2, true);
        /*       
        System.out.println(mp.isTrue(0));
        System.out.println(mp.isTrue(1));
        System.out.println(mp.isTrue(2));
        System.out.println("----------------");*/
    }
    
    public void processKeyReleased(KeyEvent e)
    {
        int i=e.getKeyCode();
        if(i==VK_LEFT) mp.setEtat(0, false);
        else if(i==VK_RIGHT) mp.setEtat(1, false);
        else if(i==VK_SPACE) mp.setEtat(2, false);
    }
}