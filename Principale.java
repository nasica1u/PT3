import java.awt.EventQueue;
import javax.swing.*;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author Reed
 */
public class Principale
{
    static Jeu j;
    /**
     *
     * @throws InterruptedException
     */
    public static void BoucleJeu() throws InterruptedException
    {
        long tempsBoucle=System.nanoTime(); // temps de dernière boucle
        final double FPS_CIBLE=60.0; // fps recherché => possibilité de modifier
        final double DELTA_OPTIMAL = 1000000000.0/FPS_CIBLE;
        double delta = 0;
        int frames=0;
        int updates=0;
        long timer=System.currentTimeMillis(); // utilisé pour compter les secondes ( calcul de frames et updates par seconde )
        
        while(j.fini==false) // condition qui contrôle l'arrêt du jeu
        {
            long actuel = System.nanoTime(); // temps actuel en nano 1*10^-9
            // (temps actuel - temps de dernière boucle)/ DELTA_OPTI => pour savoir si l'on est en retard ou en avance par rapport au temps optimal
            delta+=(actuel - tempsBoucle)/DELTA_OPTIMAL;
            tempsBoucle=actuel;
            // condition permettant de laisser le temps au render, si l'on à delta < 1, l'on est trop rapide ce qui entraîne un problème d'affichage
            while(delta>=1)
            {
                j.update();
                updates++;
                j.render();
                frames++;
                delta--;
            }
            if(System.currentTimeMillis() >= timer+1000) // s'active chaque seconde
            {
                timer+=1000; // incrémente timer d'une seconde (1000 ms)
                System.out.println("FPS: " + frames + " | " + "UPDATES: " + updates);
                // remise à zéro des frames/updates pour chaque seconde
                frames=0; 
                updates=0;
            }
        }
    }
    
    public static void main(String[] args) throws InterruptedException
    {
        //création de la frame
        j = new Jeu("Time Rider");
        j.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        j.pack();
        j.setVisible(true);
        // fin création frame
        BoucleJeu();
    }
}